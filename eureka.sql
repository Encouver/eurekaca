--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.1
-- Dumped by pg_dump version 9.4.1
-- Started on 2015-04-08 21:43:12

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 2033 (class 1262 OID 35437)
-- Dependencies: 2032
-- Name: eureka; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON DATABASE eureka IS 'Portal de Eureka';


--
-- TOC entry 179 (class 3079 OID 11855)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2036 (class 0 OID 0)
-- Dependencies: 179
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 172 (class 1259 OID 37022)
-- Name: contactos; Type: TABLE; Schema: public; Owner: eureka; Tablespace: 
--

CREATE TABLE contactos (
    id integer NOT NULL,
    nombre character varying(50) NOT NULL,
    telefono character varying(20) NOT NULL,
    correo character varying(30) NOT NULL,
    descripcion text NOT NULL
);


ALTER TABLE contactos OWNER TO eureka;

--
-- TOC entry 173 (class 1259 OID 37028)
-- Name: contactos_id_seq; Type: SEQUENCE; Schema: public; Owner: eureka
--

CREATE SEQUENCE contactos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE contactos_id_seq OWNER TO eureka;

--
-- TOC entry 2037 (class 0 OID 0)
-- Dependencies: 173
-- Name: contactos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: eureka
--

ALTER SEQUENCE contactos_id_seq OWNED BY contactos.id;


--
-- TOC entry 174 (class 1259 OID 37030)
-- Name: migration; Type: TABLE; Schema: public; Owner: eureka; Tablespace: 
--

CREATE TABLE migration (
    version character varying(180) NOT NULL,
    apply_time integer
);


ALTER TABLE migration OWNER TO eureka;

--
-- TOC entry 175 (class 1259 OID 37033)
-- Name: subscripciones; Type: TABLE; Schema: public; Owner: eureka; Tablespace: 
--

CREATE TABLE subscripciones (
    id integer NOT NULL,
    correo character varying(255) NOT NULL,
    nombre character varying(255),
    apellido character varying(255)
);


ALTER TABLE subscripciones OWNER TO eureka;

--
-- TOC entry 2038 (class 0 OID 0)
-- Dependencies: 175
-- Name: TABLE subscripciones; Type: COMMENT; Schema: public; Owner: eureka
--

COMMENT ON TABLE subscripciones IS 'Personas subscritas de la página';


--
-- TOC entry 2039 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN subscripciones.correo; Type: COMMENT; Schema: public; Owner: eureka
--

COMMENT ON COLUMN subscripciones.correo IS 'Correo del subscriptor';


--
-- TOC entry 2040 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN subscripciones.nombre; Type: COMMENT; Schema: public; Owner: eureka
--

COMMENT ON COLUMN subscripciones.nombre IS 'Nombre del subscriptor';


--
-- TOC entry 2041 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN subscripciones.apellido; Type: COMMENT; Schema: public; Owner: eureka
--

COMMENT ON COLUMN subscripciones.apellido IS 'Apellido del subscriptor';


--
-- TOC entry 176 (class 1259 OID 37039)
-- Name: subscripciones_id_seq; Type: SEQUENCE; Schema: public; Owner: eureka
--

CREATE SEQUENCE subscripciones_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE subscripciones_id_seq OWNER TO eureka;

--
-- TOC entry 2042 (class 0 OID 0)
-- Dependencies: 176
-- Name: subscripciones_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: eureka
--

ALTER SEQUENCE subscripciones_id_seq OWNED BY subscripciones.id;


--
-- TOC entry 177 (class 1259 OID 37041)
-- Name: user; Type: TABLE; Schema: public; Owner: eureka; Tablespace: 
--

CREATE TABLE "user" (
    id integer NOT NULL,
    username character varying(255) NOT NULL,
    auth_key character varying(32) NOT NULL,
    password_hash character varying(255) NOT NULL,
    password_reset_token character varying(255),
    email character varying(255) NOT NULL,
    status smallint DEFAULT 10 NOT NULL,
    created_at integer NOT NULL,
    updated_at integer NOT NULL
);


ALTER TABLE "user" OWNER TO eureka;

--
-- TOC entry 178 (class 1259 OID 37048)
-- Name: user_id_seq; Type: SEQUENCE; Schema: public; Owner: eureka
--

CREATE SEQUENCE user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE user_id_seq OWNER TO eureka;

--
-- TOC entry 2043 (class 0 OID 0)
-- Dependencies: 178
-- Name: user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: eureka
--

ALTER SEQUENCE user_id_seq OWNED BY "user".id;


--
-- TOC entry 1900 (class 2604 OID 37050)
-- Name: id; Type: DEFAULT; Schema: public; Owner: eureka
--

ALTER TABLE ONLY contactos ALTER COLUMN id SET DEFAULT nextval('contactos_id_seq'::regclass);


--
-- TOC entry 1901 (class 2604 OID 37051)
-- Name: id; Type: DEFAULT; Schema: public; Owner: eureka
--

ALTER TABLE ONLY subscripciones ALTER COLUMN id SET DEFAULT nextval('subscripciones_id_seq'::regclass);


--
-- TOC entry 1903 (class 2604 OID 37052)
-- Name: id; Type: DEFAULT; Schema: public; Owner: eureka
--

ALTER TABLE ONLY "user" ALTER COLUMN id SET DEFAULT nextval('user_id_seq'::regclass);


--
-- TOC entry 2021 (class 0 OID 37022)
-- Dependencies: 172
-- Data for Name: contactos; Type: TABLE DATA; Schema: public; Owner: eureka
--

COPY contactos (id, nombre, telefono, correo, descripcion) FROM stdin;
1	raul	04162153309	raul0115@gmail.com	Necesito ayuda urgente
2	ggggggggg	ggggggg	raul0115@hotmail.com	ddddddd
3	rtdstststs	dfsfsfs	raul@jfjf.com	ddddddddddddd
4	rrrrr	rrrrrrrrr	raul@fomof.com	odmododm
5	ssss	raul@hotmail.com	raul@hotmail.com	ssss
6	raul	04162153309	raul0115@gmail.com	Quiero una tremenda pagina la mejor de todas
7	juan	04162153309	raul0115@gmail.com	jdnjdsjsdj jsdbsdbdu  iodsiodsnisnisnsiosdnsoisno
8	raul	04162153309	raul0115@gmail.com	dddddddddddddddddddddddddddddddddddddddddddddddd             
9	juan	04162153309	raul0115@gmail.com	dddddddddddddddddddddd   ddddddddddddddddddddddd ddddddd           d 
10	juan	04162153309	raul0115@gmail.com	dddddd        d dddddddddddddddd               dddddddddddddd
\.


--
-- TOC entry 2044 (class 0 OID 0)
-- Dependencies: 173
-- Name: contactos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: eureka
--

SELECT pg_catalog.setval('contactos_id_seq', 10, true);


--
-- TOC entry 2023 (class 0 OID 37030)
-- Dependencies: 174
-- Data for Name: migration; Type: TABLE DATA; Schema: public; Owner: eureka
--

COPY migration (version, apply_time) FROM stdin;
m000000_000000_base	1423540038
m130524_201442_init	1423540042
\.


--
-- TOC entry 2024 (class 0 OID 37033)
-- Dependencies: 175
-- Data for Name: subscripciones; Type: TABLE DATA; Schema: public; Owner: eureka
--

COPY subscripciones (id, correo, nombre, apellido) FROM stdin;
\.


--
-- TOC entry 2045 (class 0 OID 0)
-- Dependencies: 176
-- Name: subscripciones_id_seq; Type: SEQUENCE SET; Schema: public; Owner: eureka
--

SELECT pg_catalog.setval('subscripciones_id_seq', 1, false);


--
-- TOC entry 2026 (class 0 OID 37041)
-- Dependencies: 177
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: eureka
--

COPY "user" (id, username, auth_key, password_hash, password_reset_token, email, status, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 2046 (class 0 OID 0)
-- Dependencies: 178
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: eureka
--

SELECT pg_catalog.setval('user_id_seq', 1, false);


--
-- TOC entry 1905 (class 2606 OID 37054)
-- Name: contactos_pkey; Type: CONSTRAINT; Schema: public; Owner: eureka; Tablespace: 
--

ALTER TABLE ONLY contactos
    ADD CONSTRAINT contactos_pkey PRIMARY KEY (id);


--
-- TOC entry 1907 (class 2606 OID 37056)
-- Name: migration_pkey; Type: CONSTRAINT; Schema: public; Owner: eureka; Tablespace: 
--

ALTER TABLE ONLY migration
    ADD CONSTRAINT migration_pkey PRIMARY KEY (version);


--
-- TOC entry 1909 (class 2606 OID 37058)
-- Name: subscripciones_pkey; Type: CONSTRAINT; Schema: public; Owner: eureka; Tablespace: 
--

ALTER TABLE ONLY subscripciones
    ADD CONSTRAINT subscripciones_pkey PRIMARY KEY (id);


--
-- TOC entry 1911 (class 2606 OID 37060)
-- Name: user_pkey; Type: CONSTRAINT; Schema: public; Owner: eureka; Tablespace: 
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);


--
-- TOC entry 2035 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2015-04-08 21:43:13

--
-- PostgreSQL database dump complete
--

