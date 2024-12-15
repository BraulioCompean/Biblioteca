--
-- PostgreSQL database dump
--

-- Dumped from database version 17.2
-- Dumped by pg_dump version 17.2

-- Started on 2024-12-14 19:50:56

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 6 (class 2615 OID 32768)
-- Name: public; Type: SCHEMA; Schema: -; Owner: neondb_owner
--

-- *not* creating schema, since initdb creates it


ALTER SCHEMA public OWNER TO neondb_owner;

--
-- TOC entry 3434 (class 0 OID 0)
-- Dependencies: 6
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: neondb_owner
--

COMMENT ON SCHEMA public IS '';


--
-- TOC entry 2 (class 3079 OID 98324)
-- Name: pgcrypto; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS pgcrypto WITH SCHEMA public;


--
-- TOC entry 3436 (class 0 OID 0)
-- Dependencies: 2
-- Name: EXTENSION pgcrypto; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION pgcrypto IS 'cryptographic functions';


--
-- TOC entry 274 (class 1255 OID 188416)
-- Name: generar_multa(); Type: FUNCTION; Schema: public; Owner: neondb_owner
--

CREATE FUNCTION public.generar_multa() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
DECLARE
    dias_retraso INT;
    nuevo_id_multa VARCHAR(8);
    contador INT;
    existe_multa INT;
    id_persona VARCHAR(20);
BEGIN
    IF NEW.fecha_devolucion < CURRENT_DATE AND NEW.fecha_entrega IS NULL THEN
        IF NEW.id_estudiante IS NULL THEN
            id_persona := NEW.id_profesor;
        ELSE
            id_persona := NEW.id_estudiante;
        END IF;

        SELECT COUNT(*)
        INTO existe_multa
        FROM multas
        WHERE (id_estudiante = id_persona OR id_profesor = id_persona)
        AND fecha_generacion = NEW.fecha_devolucion
        AND fecha_pago IS NULL;

        IF existe_multa = 0 THEN
            dias_retraso := CURRENT_DATE - NEW.fecha_devolucion;
            contador := nextval('secuencia_multa');
            nuevo_id_multa := TO_CHAR(NEW.fecha_devolucion, 'YYMMDD') || LPAD(contador::TEXT, 2, '0');

            INSERT INTO multas (id_multa, id_estudiante, id_profesor, fecha_generacion, cantidad, fecha_pago)
            VALUES (
                nuevo_id_multa,
                CASE WHEN NEW.id_estudiante IS NULL THEN NULL ELSE NEW.id_estudiante END,
                CASE WHEN NEW.id_profesor IS NULL THEN NULL ELSE NEW.id_profesor END,
                NEW.fecha_devolucion,
                100 + (dias_retraso * 100),
                NULL
            );

            UPDATE prestamos
            SET multa = nuevo_id_multa
            WHERE id_prestamo = NEW.id_prestamo;
        END IF;
    END IF;

    RETURN NEW;
END;
$$;


ALTER FUNCTION public.generar_multa() OWNER TO neondb_owner;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 221 (class 1259 OID 32786)
-- Name: estudiantes; Type: TABLE; Schema: public; Owner: neondb_owner
--

CREATE TABLE public.estudiantes (
    id_usuario character varying(8) NOT NULL,
    nombres character varying(30),
    apellidos character varying(30),
    correo character varying(60),
    telefono character varying(10),
    direccion character varying(120),
    carrera character varying(50),
    semestre integer,
    password character varying(200)
);


ALTER TABLE public.estudiantes OWNER TO neondb_owner;

--
-- TOC entry 218 (class 1259 OID 32772)
-- Name: libros; Type: TABLE; Schema: public; Owner: neondb_owner
--

CREATE TABLE public.libros (
    isbn character varying(10) NOT NULL,
    titulo character varying(60) NOT NULL,
    autor character varying(60) NOT NULL,
    editorial character varying(60),
    cantidad integer,
    categoria character varying(30) NOT NULL,
    imagen text,
    sinopsis text,
    num_pag integer,
    anio_pub integer
);


ALTER TABLE public.libros OWNER TO neondb_owner;

--
-- TOC entry 219 (class 1259 OID 32777)
-- Name: multas; Type: TABLE; Schema: public; Owner: neondb_owner
--

CREATE TABLE public.multas (
    id_multa character varying(8) NOT NULL,
    id_estudiante character varying(8),
    fecha_generacion date,
    cantidad double precision,
    fecha_pago date,
    id_profesor character varying(8)
);


ALTER TABLE public.multas OWNER TO neondb_owner;

--
-- TOC entry 224 (class 1259 OID 155654)
-- Name: prestamos_id_prestamo_seq; Type: SEQUENCE; Schema: public; Owner: neondb_owner
--

CREATE SEQUENCE public.prestamos_id_prestamo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.prestamos_id_prestamo_seq OWNER TO neondb_owner;

--
-- TOC entry 220 (class 1259 OID 32780)
-- Name: prestamos; Type: TABLE; Schema: public; Owner: neondb_owner
--

CREATE TABLE public.prestamos (
    isbn character varying(10),
    id_estudiante character varying(8),
    fecha_prestamo date,
    fecha_devolucion date,
    fecha_entrega date,
    multa character varying(8),
    id_prestamo integer DEFAULT nextval('public.prestamos_id_prestamo_seq'::regclass) NOT NULL,
    id_profesor character varying(8)
);


ALTER TABLE public.prestamos OWNER TO neondb_owner;

--
-- TOC entry 222 (class 1259 OID 73733)
-- Name: profesores; Type: TABLE; Schema: public; Owner: neondb_owner
--

CREATE TABLE public.profesores (
    id_usuario character varying(8) NOT NULL,
    nombres character varying(30),
    apellidos character varying(30),
    correo character varying(60),
    telefono character varying(10),
    direccion character varying(100),
    rol character varying(20),
    departamento character varying(50),
    password character varying(200)
);


ALTER TABLE public.profesores OWNER TO neondb_owner;

--
-- TOC entry 223 (class 1259 OID 90131)
-- Name: recomendados; Type: TABLE; Schema: public; Owner: neondb_owner
--

CREATE TABLE public.recomendados (
    profesor character varying(8),
    estudiante character varying(8),
    libro character varying(10),
    id_recomendacion integer NOT NULL,
    gusto boolean,
    calificacion integer
);


ALTER TABLE public.recomendados OWNER TO neondb_owner;

--
-- TOC entry 226 (class 1259 OID 204800)
-- Name: recomendados_id_recomendacion_seq; Type: SEQUENCE; Schema: public; Owner: neondb_owner
--

CREATE SEQUENCE public.recomendados_id_recomendacion_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.recomendados_id_recomendacion_seq OWNER TO neondb_owner;

--
-- TOC entry 3437 (class 0 OID 0)
-- Dependencies: 226
-- Name: recomendados_id_recomendacion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: neondb_owner
--

ALTER SEQUENCE public.recomendados_id_recomendacion_seq OWNED BY public.recomendados.id_recomendacion;


--
-- TOC entry 225 (class 1259 OID 188418)
-- Name: secuencia_multa; Type: SEQUENCE; Schema: public; Owner: neondb_owner
--

CREATE SEQUENCE public.secuencia_multa
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.secuencia_multa OWNER TO neondb_owner;

--
-- TOC entry 3248 (class 2604 OID 204801)
-- Name: recomendados id_recomendacion; Type: DEFAULT; Schema: public; Owner: neondb_owner
--

ALTER TABLE ONLY public.recomendados ALTER COLUMN id_recomendacion SET DEFAULT nextval('public.recomendados_id_recomendacion_seq'::regclass);


--
-- TOC entry 3423 (class 0 OID 32786)
-- Dependencies: 221
-- Data for Name: estudiantes; Type: TABLE DATA; Schema: public; Owner: neondb_owner
--

COPY public.estudiantes (id_usuario, nombres, apellidos, correo, telefono, direccion, carrera, semestre, password) FROM stdin;
00000001	Juan	Perez	juan.perez@email.com	1234567890	Calle Ficticia 123	Sistemas	1	$2a$06$BDDy8dcVc9GWeRY5TBQ.Reb7sJ/7YocdbDzDWMkiNWgXRyQPxbSoq
00000002	Maria	Gomez	maria.gomez@email.com	0987654321	Av. Real 456	Agronomia	2	$2a$06$0ijXk0zS7/e2doUolxNzkeGp0Vv4tuRg1HeCzKP3cV7e6O0LrDfoK
00000003	Carlos	Martinez	carlos.martinez@email.com	1122334455	Calle Luna 789	Industrial	3	$2a$06$c3l1ZHzEXYdpm77t6WU4Xe2qCWw.CciPuZcITshBsYMbqmb/soUFq
00000004	Ana	Sanchez	ana.sanchez@email.com	2233445566	Calle Sol 101	Sistemas	4	$2a$06$s3KoQa8Ngl.rBxLhYFL43OceElk/Gfwc7p2SYy0M.s.GIm/07LeQW
00000005	Luis	Fernandez	luis.fernandez@email.com	3344556677	Calle Mar 202	Alimentarias	5	$2a$06$OfYRskWQFXB3l7hLgRGRKuVeXAPLnR.lXjGN.nPaPKl2TeMXwLqTG
06717212	Rodolfo	Ramirez	rdfm12571@gmail.com	1712126126	Calle Imaginaria 210	Ingenieria Industrial	2	$2a$06$qf.NcXqbEvkr3HxsCHDXF.sR9HeSAamsIJXns4/uXFLFXfxoaM7Gq
93671767	Alexis	Mata	almta@gmail.com	1261261261	Calle NOSE	Ingenieria Ambiental	2	$2a$06$N2pXKvslLFt0dA4rWWEHEuIAOq.h7Rciwi87P9zWkzeOutFezm9zC
19324050	Angel Jr	Hernandez	angel@example.com	5557779900	Islas 430	Sistemas	5	$2a$06$1P4Yg37Q5p3JsfLTkVnHluis90495Gz0gHBAITqkJyJ6DjrSEBp5m
\.


--
-- TOC entry 3420 (class 0 OID 32772)
-- Dependencies: 218
-- Data for Name: libros; Type: TABLE DATA; Schema: public; Owner: neondb_owner
--

COPY public.libros (isbn, titulo, autor, editorial, cantidad, categoria, imagen, sinopsis, num_pag, anio_pub) FROM stdin;
8417216944	Matar un ruiseñor	Harper Lee	Novoprint	0	Novela	https://is5-ssl.mzstatic.com/image/thumb/Publication122/v4/e4/24/dd/e424ddf8-c471-b69b-1701-658c68c269bd/9780063026032.jpg/100000x100000-999.jpg	Matar a un ruiseñor es una novela de Harper Lee que cuenta la historia de un hombre negro acusado de violar a una mujer blanca en el sur de los Estados Unidos en la década de 1930. La historia se desarrolla desde la perspectiva de Jem y Scout Finch, y muestra la irracionalidad de los adultos ante la raza y la clase social.	281	1960
6070732723	Orgullo y prejuicio	Jane Austen	Planeta Publishing	0	Novela	https://is5-ssl.mzstatic.com/image/thumb/Publication112/v4/2c/7e/bb/2c7ebb6c-951e-df30-356b-2ea97c947bcf/9788467046076.jpg/100000x100000-999.jpg	La historia de las hermanas Bennet, conlleva un padre indolente, una madre histérica e irresponsable, la presencia elegante y varonil de Fitzwilliam Darcy, y un plantel de secundarios absolutamente deliciosos. No es de sorprender que causara de inmediato un tremendo revuelo en los cenáculos literarios de Londres, donde se valoró muy positivamente la novela.Elizabeth Bennet ya no es la damisela inválida, es una mujer inteligente, independiente, crítica, maliciosa, divertida, sensata, aventurera y sincera.	352	1813
8491051120	Los miserables	Victor Hugo	Penguin Classics	1	Novela	https://is5-ssl.mzstatic.com/image/thumb/Publication5/v4/74/d4/23/74d42303-7c01-17fc-8335-fa40f8ee78a4/1011250519.jpg/100000x100000-999.jpg	Les misérables (1862) es una novela publicada por Victor Hugo y está considerada como una de las obras más conocidas del siglo XIX.\r\n\r\nLa novela, de estilo romántico, plantea a través de su argumento un razonamiento sobre el bien y el mal, sobre la ley, la política, la ética, la justicia y la religión.\r\n	1090	1862
843760494	Cien Años de Soledad	Gabriel García Márquez	Editorial Sudamericana	0	Novela	https://is5-ssl.mzstatic.com/image/thumb/Publication124/v4/50/07/81/50078143-1dd8-e666-6407-93a42c653a0a/9781101910979.jpg/100000x100000-999.jpg	Entre la boda de José Arcadio Buendía con Amelia Iguarán hasta la maldición de Aureliano Babilonia transcurre todo un siglo. Cien años de soledad para una estirpe única, fantástica, capaz de fundar una ciudad tan especial como Macondo y de engendrar niños con cola de cerdo. En medio, una larga docena de personajes dejarán su impronta a las generaciones venideras, que tendrán que lidiar con un mundo tan complejo como sencillo.	471	1967
9688670006	Ulises	James Joyce	COLOFON	1	Novela	https://is5-ssl.mzstatic.com/image/thumb/Publication126/v4/32/c8/18/32c818de-040d-9604-18d3-97d916bc1b62/9788466360050.jpg/100000x100000-999.jpg	El Ulises de James Joyce, desde su publicación en 1922 por la librería Shakespeare and Company de París, tuvo una azarosa vida, en la que su rasgo más característico fue su prohibición a entrar legalmente en los países de habla inglesa y, lógicamente, a ser editado en Inglaterra y Estados Unidos, bajo la acusación de atentar contra la moral pública. Sin embargo, mereció también el calificativo de obra maestra de la literatura contemporánea, otorgado por los más importantes críticos y escritores de todo el mundo. Actualmente se le considera, sin discusión alguna, como la obra representativa de la novela del siglo XX y un texto fundamental para entender la historia literaria.	816	1922
8420665657	Crimen y castigo	Fiódor Dostoyevski	Alianza	9	Novela	https://is5-ssl.mzstatic.com/image/thumb/Publication116/v4/eb/b7/a2/ebb7a28a-bb07-0521-b4ab-b442b879d6e2/9788413625966.jpg/100000x100000-999.jpg	Crimen y castigo (1866) es seguramente la obra más lograda de Fiódor Dostoyevski (1821-1881). En esta parábola de transgresión y expiación, las elucubraciones de su protagonista Rodion Raskolnikov -nihilista descarriado por las teorías utilitaristas procedentes de Occidente- en torno al derecho de los hombres extraordinarios a utilizar el asesinato como medio para alcanzar fines superiores confieren al relato su carga ideológica. Sin embargo, los argumentos doctrinales encaminados a justificar la muerte de una vieja prestamista se combinan de forma inextricable con el estudio psicológico del criminal, cuyo forcejeo y desgarro íntimos confieren a la novela sus excepcionales complejidad y hondura.	650	1866
6073104561	La casa de los espíritus	Isabel Allende	Penguin Random House Grupo Editorial SA de CV	3	Novela	https://is5-ssl.mzstatic.com/image/thumb/Publication126/v4/28/1a/e5/281ae505-8657-45b5-0663-e551365468a8/9788401342585.jpg/100000x100000-999.jpg	La primera novela de Isabel Allende, la casa de los espíritus narra la saga de una poderosa familia de terratenientes latinoamericanos. El despótico patriarca Esteban Trueba ha construido con mano de hierro un imperio privado que empieza a tambalearse con el paso del tiempo y un entorno social explosivo. Finalmente, la decadencia personal del patriarca arrastrará a los Trueba a una dolorosa desintegración. Atrapados en unas dramáticas relaciones familiares, los personajes de esta poderosa novela encarnan las tensiones sociales y espirituales de una época que abarca gran parte del siglo XX. Con impecable pulso narrativo y gran lucidez histórica, Isabel Allende ha creado un fresco en el que conviven lo cotidiano con lo maravilloso, el amor con la revolución y los personales con la dura realidad política.	456	1982
0307389731	El amor en los tiempos del cólera	Gabriel García Márquez	Vintage Español	4	Romance	https://is1-ssl.mzstatic.com/image/thumb/Publication116/v4/cb/97/02/cb970246-f667-40da-d489-b2c93cc341d6/9786070726743.jpg/600x600bb.jpg	&quot;Florentino Ariza no había dejado de pensar en ella un solo instante después de que Fermina Daza lo rechazó sin apelación después de unos amores largos y contrariados, y habían transcurrido desde entonces cincuenta y un años, nueve meses y cuatro días.&quot; Ambientada entre 1880 y los años treinta en una ciudad portuaria innombrada pero que se ha identificado con la legendaria Cartagena colombiana, donde Gabriel García Márquez escribiera sus primeros textos, la apasionada historia que aquí se cuenta está entre las más recordadas de la literatura contemporánea. En una sociedad enfrentada entre el convencionalismo y la vanguardia, la costumbre y el progreso científico, el romance de Florentino Ariza y Fermina Daza está destinado a permanecer en la memoria de sus lectores en un tiempo idílico.	368	1985
6073116330	1984	George Orwell	Booket	1	Ciencia ficcion	https://is1-ssl.mzstatic.com/image/thumb/Publication122/v4/24/e8/c2/24e8c2a4-c6fb-470d-8e68-bad81d739899/1984_CP_2022-5.jpg/600x600bb.jpg	Londres, 1984: el Gran Hermano controla hasta el último detalle de la vida privada de los ciudadanos. Winston Smith trabaja en el Ministerio de la Verdad reescribiendo y retocando la historia para un estado totalitario que somete de forma despiadada a la población, hasta que siente que no quiere contribuir más a este sistema perverso y decide rebelarse.\r\n\r\nEscrita en 1948, esta novela es una de las críticas más feroces que jamás haya recibido cualquier forma de totalitarismo. Los mecanismos de control de la sociedad orwelliana recuerdan a los del nazismo y el estalinismo, y su magnífico análisis del poder y de la manipulación de la información la convierten en una novela de una vigencia estremecedora.	326	1949
\.


--
-- TOC entry 3421 (class 0 OID 32777)
-- Dependencies: 219
-- Data for Name: multas; Type: TABLE DATA; Schema: public; Owner: neondb_owner
--

COPY public.multas (id_multa, id_estudiante, fecha_generacion, cantidad, fecha_pago, id_profesor) FROM stdin;
24120710	\N	2024-12-07	400	2024-12-10	P0000002
24120811	00000001	2024-12-04	300	2024-12-05	\N
24121110	00000001	2024-12-11	200	\N	\N
24110508	00000002	2024-11-05	3400	\N	\N
24120709	00000002	2024-12-07	200	\N	\N
24120310	00000001	2024-12-03	800	\N	\N
\.


--
-- TOC entry 3422 (class 0 OID 32780)
-- Dependencies: 220
-- Data for Name: prestamos; Type: TABLE DATA; Schema: public; Owner: neondb_owner
--

COPY public.prestamos (isbn, id_estudiante, fecha_prestamo, fecha_devolucion, fecha_entrega, multa, id_prestamo, id_profesor) FROM stdin;
6073116330	00000001	2024-12-07	2024-12-19	2024-12-08	\N	14	\N
6073116330	00000001	2024-12-10	2024-12-27	\N	\N	66	\N
6070732723	00000001	2024-12-10	2024-12-18	\N	\N	67	\N
6073104561	00000001	2024-12-01	2024-12-03	2024-12-10	24120310	62	\N
6073116330	00000002	2024-11-01	2024-11-05	\N	24110508	34	\N
6073104561	00000002	0204-12-04	2024-12-07	\N	24120709	39	\N
9688670006	00000001	2024-12-10	2024-12-08	2024-12-10	24120811	70	\N
6070732723	00000002	2024-12-10	2024-12-16	\N	\N	71	\N
0307389731	19324050	2024-12-12	2024-12-13	\N	\N	116	\N
843760494	19324050	2024-12-12	2024-12-13	\N	\N	117	\N
9688670006	19324050	2024-12-12	2024-12-13	\N	\N	118	\N
6073116330	19324050	2024-12-12	2024-12-13	\N	\N	119	\N
8417216944	19324050	2024-12-12	2024-12-13	\N	\N	120	\N
8417216944	\N	2024-12-12	2024-12-20	\N	\N	121	00000010
8417216944	\N	2024-12-05	2024-12-07	2024-12-10	24120710	73	P0000002
9688670006	\N	2024-12-10	2024-12-25	\N	\N	76	P0000001
0307389731	00000002	2024-12-11	2024-12-20	2024-12-11	\N	78	\N
0307389731	00000001	2024-12-11	2024-12-21	2024-12-11	\N	82	\N
0307389731	\N	2024-12-12	2024-12-13	2024-12-12	\N	84	22690423
9688670006	00000001	2024-12-10	2024-12-11	\N	24121110	81	\N
843760494	00000002	2024-12-08	2024-12-12	\N	\N	80	\N
8420665657	\N	2024-12-08	2024-12-19	\N	\N	79	P0000002
6073104561	19324050	2024-12-12	2024-12-19	\N	\N	85	\N
\.


--
-- TOC entry 3424 (class 0 OID 73733)
-- Dependencies: 222
-- Data for Name: profesores; Type: TABLE DATA; Schema: public; Owner: neondb_owner
--

COPY public.profesores (id_usuario, nombres, apellidos, correo, telefono, direccion, rol, departamento, password) FROM stdin;
P0000001	Luis	Gonzalez	luis.gonzalez@email.com	1112233445	Calle Principal 10	profesor	Sistemas	$2a$06$yBXI4dzm20H4MfDuM0ZbROdmyebIY.Lv7stdVA4MKJgAjysmvxWi2
P0000002	Marta	Lopez	marta.lopez@email.com	2233445566	Calle Secundaria 20	profesor	Industrial	$2a$06$zTguCS9mh2QTQ4GlQOTruOJVYbMJN/1lRcgI3BmR/JVylzDwAqevq
P0000003	Carlos	Perez	carlos.perez@email.com	3344556677	Av. de la Ciencia 30	profesor	Industrial	$2a$06$iGJp2Vl3iIkoyqGfm40GguY4ITeGSCE.d8lrZvcX8j5XIjDHqU.2a
P0000004	Ana	Rodriguez	ana.rodriguez@email.com	4455667788	Calle Sol 40	profesor	Ciencias basicas	$2a$06$oVKDJW05oDDWiIYJp1fnPOfqb9cKGt1.rA5byWgiNViTzE716CfXW
P0000005	Jose	Martinez	jose.martinez@email.com	5566778899	Calle Luna 50	administrador	Sitemas	$2a$06$ad/eKV5NgYFcFymThOcRWO97nzWUOhwpXRSta8AExlmLyBQnF.D4G
P0000006	Braulio	Perez Compean	22690128@tecvalles.mx	\N	Calle Reforma 224	administrador	Sistemas	braulio320
P1234567	Juan Carlos	Gomez Pérez	juan.gomez@ejemplo.com	1234567890	Calle Ficticia 123	profesor	Ciencias basicas	$2a$06$m.86H89R5wokr6MSke.g3uE6xdZQBobDp86E4XEFvDrdK5MOJMgEm
97126121	Hugo	Lopez Perez	hugo_lp@tecvalles.mx	4871251621	Calle Fictisia 123	profesor	Sistemas	$2a$06$jUCz/mlFrtvt8DnNSApjhueD1PGOALpwXZPN0bcgl1rF.YgcNp1BC
22690423	Jose A	Torres	jose@example.com	5550001100	Pedro Paramo 2	Profesor	Ciencias	$2a$06$QPAFvuwIPU1gmDqwGCWYIuvgmlHjRQKHA4pJSPkr.bKhlbSoYrOQ6
00000010	Mateo	Torres	mateo@example.com	0000000000	asas	profesor	Sistemas	$2a$06$OBBDVV0LbYQtWpfAneFRi.efw63qLE1dKl1jg2Wu8CvD6Z1wxmOFm
\.


--
-- TOC entry 3425 (class 0 OID 90131)
-- Dependencies: 223
-- Data for Name: recomendados; Type: TABLE DATA; Schema: public; Owner: neondb_owner
--

COPY public.recomendados (profesor, estudiante, libro, id_recomendacion, gusto, calificacion) FROM stdin;
P0000001	00000001	9688670006	5	\N	\N
P0000001	00000002	9688670006	17	\N	\N
P0000001	00000001	8491051120	18	\N	\N
P0000001	00000001	8420665657	19	\N	\N
P0000002	00000002	8417216944	22	\N	\N
P0000001	00000001	6070732723	23	\N	\N
22690423	19324050	0307389731	24	\N	\N
22690423	19324050	843760494	26	\N	\N
22690423	19324050	8417216944	28	\N	\N
00000010	00000002	6070732723	40	t	\N
00000010	19324050	8420665657	34	\N	\N
00000010	19324050	6073116330	35	f	\N
\.


--
-- TOC entry 3438 (class 0 OID 0)
-- Dependencies: 224
-- Name: prestamos_id_prestamo_seq; Type: SEQUENCE SET; Schema: public; Owner: neondb_owner
--

SELECT pg_catalog.setval('public.prestamos_id_prestamo_seq', 121, true);


--
-- TOC entry 3439 (class 0 OID 0)
-- Dependencies: 226
-- Name: recomendados_id_recomendacion_seq; Type: SEQUENCE SET; Schema: public; Owner: neondb_owner
--

SELECT pg_catalog.setval('public.recomendados_id_recomendacion_seq', 35, true);


--
-- TOC entry 3440 (class 0 OID 0)
-- Dependencies: 225
-- Name: secuencia_multa; Type: SEQUENCE SET; Schema: public; Owner: neondb_owner
--

SELECT pg_catalog.setval('public.secuencia_multa', 107, true);


--
-- TOC entry 3250 (class 2606 OID 106497)
-- Name: libros libros_pkey; Type: CONSTRAINT; Schema: public; Owner: neondb_owner
--

ALTER TABLE ONLY public.libros
    ADD CONSTRAINT libros_pkey PRIMARY KEY (isbn);


--
-- TOC entry 3252 (class 2606 OID 32794)
-- Name: multas multas_pkey; Type: CONSTRAINT; Schema: public; Owner: neondb_owner
--

ALTER TABLE ONLY public.multas
    ADD CONSTRAINT multas_pkey PRIMARY KEY (id_multa);


--
-- TOC entry 3254 (class 2606 OID 155656)
-- Name: prestamos prestamos_pkey; Type: CONSTRAINT; Schema: public; Owner: neondb_owner
--

ALTER TABLE ONLY public.prestamos
    ADD CONSTRAINT prestamos_pkey PRIMARY KEY (id_prestamo);


--
-- TOC entry 3260 (class 2606 OID 73739)
-- Name: profesores profesores_pkey; Type: CONSTRAINT; Schema: public; Owner: neondb_owner
--

ALTER TABLE ONLY public.profesores
    ADD CONSTRAINT profesores_pkey PRIMARY KEY (id_usuario);


--
-- TOC entry 3262 (class 2606 OID 204803)
-- Name: recomendados recomendados_pkey; Type: CONSTRAINT; Schema: public; Owner: neondb_owner
--

ALTER TABLE ONLY public.recomendados
    ADD CONSTRAINT recomendados_pkey PRIMARY KEY (id_recomendacion);


--
-- TOC entry 3264 (class 2606 OID 212993)
-- Name: recomendados unica_recomendacion; Type: CONSTRAINT; Schema: public; Owner: neondb_owner
--

ALTER TABLE ONLY public.recomendados
    ADD CONSTRAINT unica_recomendacion UNIQUE (profesor, estudiante, libro);


--
-- TOC entry 3258 (class 2606 OID 32800)
-- Name: estudiantes usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: neondb_owner
--

ALTER TABLE ONLY public.estudiantes
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id_usuario);


--
-- TOC entry 3255 (class 1259 OID 172033)
-- Name: unico_libro_estudiante_sin_entregar; Type: INDEX; Schema: public; Owner: neondb_owner
--

CREATE UNIQUE INDEX unico_libro_estudiante_sin_entregar ON public.prestamos USING btree (isbn, id_estudiante) WHERE (fecha_entrega IS NULL);


--
-- TOC entry 3256 (class 1259 OID 229377)
-- Name: unico_libro_profesor_sin_entregar; Type: INDEX; Schema: public; Owner: neondb_owner
--

CREATE UNIQUE INDEX unico_libro_profesor_sin_entregar ON public.prestamos USING btree (isbn, id_profesor) WHERE (fecha_entrega IS NULL);


--
-- TOC entry 3273 (class 2620 OID 188420)
-- Name: prestamos generar_multa_trigger; Type: TRIGGER; Schema: public; Owner: neondb_owner
--

CREATE TRIGGER generar_multa_trigger AFTER INSERT OR UPDATE ON public.prestamos FOR EACH ROW WHEN (((new.fecha_devolucion < CURRENT_DATE) AND (new.fecha_entrega IS NULL))) EXECUTE FUNCTION public.generar_multa();


--
-- TOC entry 3274 (class 2620 OID 188417)
-- Name: prestamos verificar_multa; Type: TRIGGER; Schema: public; Owner: neondb_owner
--

CREATE TRIGGER verificar_multa AFTER UPDATE ON public.prestamos FOR EACH ROW WHEN (((old.fecha_devolucion IS DISTINCT FROM new.fecha_devolucion) OR (old.fecha_entrega IS DISTINCT FROM new.fecha_entrega))) EXECUTE FUNCTION public.generar_multa();


--
-- TOC entry 3265 (class 2606 OID 221189)
-- Name: multas id_profesor; Type: FK CONSTRAINT; Schema: public; Owner: neondb_owner
--

ALTER TABLE ONLY public.multas
    ADD CONSTRAINT id_profesor FOREIGN KEY (id_profesor) REFERENCES public.profesores(id_usuario);


--
-- TOC entry 3266 (class 2606 OID 32801)
-- Name: multas id_usuario; Type: FK CONSTRAINT; Schema: public; Owner: neondb_owner
--

ALTER TABLE ONLY public.multas
    ADD CONSTRAINT id_usuario FOREIGN KEY (id_estudiante) REFERENCES public.estudiantes(id_usuario);


--
-- TOC entry 3267 (class 2606 OID 90136)
-- Name: prestamos prestamos-estudiantes-idEstudiante; Type: FK CONSTRAINT; Schema: public; Owner: neondb_owner
--

ALTER TABLE ONLY public.prestamos
    ADD CONSTRAINT "prestamos-estudiantes-idEstudiante" FOREIGN KEY (id_estudiante) REFERENCES public.estudiantes(id_usuario) NOT VALID;


--
-- TOC entry 3268 (class 2606 OID 98319)
-- Name: prestamos prestamos-multas; Type: FK CONSTRAINT; Schema: public; Owner: neondb_owner
--

ALTER TABLE ONLY public.prestamos
    ADD CONSTRAINT "prestamos-multas" FOREIGN KEY (multa) REFERENCES public.multas(id_multa) NOT VALID;


--
-- TOC entry 3269 (class 2606 OID 221184)
-- Name: prestamos prestamos_profesores_idprofesor; Type: FK CONSTRAINT; Schema: public; Owner: neondb_owner
--

ALTER TABLE ONLY public.prestamos
    ADD CONSTRAINT prestamos_profesores_idprofesor FOREIGN KEY (id_profesor) REFERENCES public.profesores(id_usuario);


--
-- TOC entry 3270 (class 2606 OID 98309)
-- Name: recomendados recomendados-estudiantes; Type: FK CONSTRAINT; Schema: public; Owner: neondb_owner
--

ALTER TABLE ONLY public.recomendados
    ADD CONSTRAINT "recomendados-estudiantes" FOREIGN KEY (estudiante) REFERENCES public.estudiantes(id_usuario) NOT VALID;


--
-- TOC entry 3271 (class 2606 OID 147456)
-- Name: recomendados recomendados-libros; Type: FK CONSTRAINT; Schema: public; Owner: neondb_owner
--

ALTER TABLE ONLY public.recomendados
    ADD CONSTRAINT "recomendados-libros" FOREIGN KEY (libro) REFERENCES public.libros(isbn) NOT VALID;


--
-- TOC entry 3272 (class 2606 OID 98304)
-- Name: recomendados recomendados-profesores; Type: FK CONSTRAINT; Schema: public; Owner: neondb_owner
--

ALTER TABLE ONLY public.recomendados
    ADD CONSTRAINT "recomendados-profesores" FOREIGN KEY (profesor) REFERENCES public.profesores(id_usuario) NOT VALID;


--
-- TOC entry 3435 (class 0 OID 0)
-- Dependencies: 6
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: neondb_owner
--

REVOKE USAGE ON SCHEMA public FROM PUBLIC;


--
-- TOC entry 2105 (class 826 OID 40961)
-- Name: DEFAULT PRIVILEGES FOR SEQUENCES; Type: DEFAULT ACL; Schema: public; Owner: cloud_admin
--

ALTER DEFAULT PRIVILEGES FOR ROLE cloud_admin IN SCHEMA public GRANT ALL ON SEQUENCES TO neon_superuser WITH GRANT OPTION;


--
-- TOC entry 2104 (class 826 OID 40960)
-- Name: DEFAULT PRIVILEGES FOR TABLES; Type: DEFAULT ACL; Schema: public; Owner: cloud_admin
--

ALTER DEFAULT PRIVILEGES FOR ROLE cloud_admin IN SCHEMA public GRANT ALL ON TABLES TO neon_superuser WITH GRANT OPTION;


-- Completed on 2024-12-14 19:51:10

--
-- PostgreSQL database dump complete
--

