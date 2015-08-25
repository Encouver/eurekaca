--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.5
-- Dumped by pg_dump version 9.3.5
-- Started on 2015-08-25 02:39:28

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 1942 (class 1262 OID 16395)
-- Dependencies: 1941
-- Name: eureksol_eureka; Type: COMMENT; Schema: -; Owner: eureka
--

COMMENT ON DATABASE eureksol_eureka IS 'Página de Eureka';


--
-- TOC entry 173 (class 3079 OID 11750)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 1945 (class 0 OID 0)
-- Dependencies: 173
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


--
-- TOC entry 172 (class 3079 OID 16384)
-- Name: adminpack; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS adminpack WITH SCHEMA pg_catalog;


--
-- TOC entry 1946 (class 0 OID 0)
-- Dependencies: 172
-- Name: EXTENSION adminpack; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION adminpack IS 'administrative functions for PostgreSQL';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 170 (class 1259 OID 255349)
-- Name: mensajes; Type: TABLE; Schema: public; Owner: eureka; Tablespace: 
--

CREATE TABLE mensajes (
    id integer NOT NULL,
    nombre character varying(255) NOT NULL,
    apellido character varying(255) NOT NULL,
    telefono character varying(50) NOT NULL,
    correo character varying(255) NOT NULL,
    mensaje text NOT NULL
);


ALTER TABLE public.mensajes OWNER TO eureka;

--
-- TOC entry 1947 (class 0 OID 0)
-- Dependencies: 170
-- Name: TABLE mensajes; Type: COMMENT; Schema: public; Owner: eureka
--

COMMENT ON TABLE mensajes IS 'Almacena los mensajes de los usuarios.';


--
-- TOC entry 1948 (class 0 OID 0)
-- Dependencies: 170
-- Name: COLUMN mensajes.id; Type: COMMENT; Schema: public; Owner: eureka
--

COMMENT ON COLUMN mensajes.id IS 'Clave primaria.';


--
-- TOC entry 1949 (class 0 OID 0)
-- Dependencies: 170
-- Name: COLUMN mensajes.nombre; Type: COMMENT; Schema: public; Owner: eureka
--

COMMENT ON COLUMN mensajes.nombre IS 'Nombre de la persona.';


--
-- TOC entry 1950 (class 0 OID 0)
-- Dependencies: 170
-- Name: COLUMN mensajes.apellido; Type: COMMENT; Schema: public; Owner: eureka
--

COMMENT ON COLUMN mensajes.apellido IS 'Apellido de la persona.';


--
-- TOC entry 1951 (class 0 OID 0)
-- Dependencies: 170
-- Name: COLUMN mensajes.telefono; Type: COMMENT; Schema: public; Owner: eureka
--

COMMENT ON COLUMN mensajes.telefono IS 'Teléfono de la persona.';


--
-- TOC entry 1952 (class 0 OID 0)
-- Dependencies: 170
-- Name: COLUMN mensajes.correo; Type: COMMENT; Schema: public; Owner: eureka
--

COMMENT ON COLUMN mensajes.correo IS 'Correo de la persona.';


--
-- TOC entry 1953 (class 0 OID 0)
-- Dependencies: 170
-- Name: COLUMN mensajes.mensaje; Type: COMMENT; Schema: public; Owner: eureka
--

COMMENT ON COLUMN mensajes.mensaje IS 'Mensaje de la persona.';


--
-- TOC entry 171 (class 1259 OID 255355)
-- Name: mensajes_id_seq; Type: SEQUENCE; Schema: public; Owner: eureka
--

CREATE SEQUENCE mensajes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.mensajes_id_seq OWNER TO eureka;

--
-- TOC entry 1954 (class 0 OID 0)
-- Dependencies: 171
-- Name: mensajes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: eureka
--

ALTER SEQUENCE mensajes_id_seq OWNED BY mensajes.id;


--
-- TOC entry 1825 (class 2604 OID 255357)
-- Name: id; Type: DEFAULT; Schema: public; Owner: eureka
--

ALTER TABLE ONLY mensajes ALTER COLUMN id SET DEFAULT nextval('mensajes_id_seq'::regclass);


--
-- TOC entry 1935 (class 0 OID 255349)
-- Dependencies: 170
-- Data for Name: mensajes; Type: TABLE DATA; Schema: public; Owner: eureka
--

COPY mensajes (id, nombre, apellido, telefono, correo, mensaje) FROM stdin;
\.


--
-- TOC entry 1955 (class 0 OID 0)
-- Dependencies: 171
-- Name: mensajes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: eureka
--

SELECT pg_catalog.setval('mensajes_id_seq', 8, true);


--
-- TOC entry 1827 (class 2606 OID 255359)
-- Name: mensajes_pkey; Type: CONSTRAINT; Schema: public; Owner: eureka; Tablespace: 
--

ALTER TABLE ONLY mensajes
    ADD CONSTRAINT mensajes_pkey PRIMARY KEY (id);


--
-- TOC entry 1944 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2015-08-25 02:39:28

--
-- PostgreSQL database dump complete
--

