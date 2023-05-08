--
-- PostgreSQL database dump
--

-- Dumped from database version 10.18
-- Dumped by pg_dump version 10.18

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


--
-- Name: article_seq; Type: SEQUENCE; Schema: public; Owner: societe
--

CREATE SEQUENCE public.article_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.article_seq OWNER TO societe;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: article; Type: TABLE; Schema: public; Owner: societe
--

CREATE TABLE public.article (
    id integer NOT NULL,
    articleid character varying(10) DEFAULT ('AT'::text || to_char(nextval('public.article_seq'::regclass), 'FM0000'::text)) NOT NULL,
    titre character varying(30) NOT NULL,
    contenu text NOT NULL,
    categorie integer,
    resume text NOT NULL
);


ALTER TABLE public.article OWNER TO societe;

--
-- Name: article_id_seq; Type: SEQUENCE; Schema: public; Owner: societe
--

CREATE SEQUENCE public.article_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.article_id_seq OWNER TO societe;

--
-- Name: article_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: societe
--

ALTER SEQUENCE public.article_id_seq OWNED BY public.article.id;


--
-- Name: categorie_seq; Type: SEQUENCE; Schema: public; Owner: societe
--

CREATE SEQUENCE public.categorie_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categorie_seq OWNER TO societe;

--
-- Name: categorie; Type: TABLE; Schema: public; Owner: societe
--

CREATE TABLE public.categorie (
    id integer NOT NULL,
    categorieid character varying(10) DEFAULT ('CT'::text || to_char(nextval('public.categorie_seq'::regclass), 'FM000'::text)) NOT NULL,
    nomcategorie character varying(40) NOT NULL
);


ALTER TABLE public.categorie OWNER TO societe;

--
-- Name: categorie_id_seq; Type: SEQUENCE; Schema: public; Owner: societe
--

CREATE SEQUENCE public.categorie_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categorie_id_seq OWNER TO societe;

--
-- Name: categorie_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: societe
--

ALTER SEQUENCE public.categorie_id_seq OWNED BY public.categorie.id;


--
-- Name: v_article; Type: VIEW; Schema: public; Owner: societe
--

CREATE VIEW public.v_article AS
 SELECT article.id,
    article.articleid,
    article.titre,
    article.contenu,
    article.categorie,
    article.resume,
    categorie.nomcategorie,
    categorie.categorieid
   FROM (public.article
     JOIN public.categorie ON ((article.categorie = categorie.id)));


ALTER TABLE public.v_article OWNER TO societe;

--
-- Name: article id; Type: DEFAULT; Schema: public; Owner: societe
--

ALTER TABLE ONLY public.article ALTER COLUMN id SET DEFAULT nextval('public.article_id_seq'::regclass);


--
-- Name: categorie id; Type: DEFAULT; Schema: public; Owner: societe
--

ALTER TABLE ONLY public.categorie ALTER COLUMN id SET DEFAULT nextval('public.categorie_id_seq'::regclass);


--
-- Data for Name: article; Type: TABLE DATA; Schema: public; Owner: societe
--

COPY public.article (id, articleid, titre, contenu, categorie, resume) FROM stdin;
2	AT0002	Mampalahelo	<h1>Resy i LiverPool Mazava!!!😁</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n\t<li>satria tsy dia nahay zala</li>\r\n\t<li>sady faha-10 anaty division</li>\r\n</ol>	2	2-1 ny score
1	AT0001	Resy Liverpool	Content	1	Resy I Liverpool
\.


--
-- Data for Name: categorie; Type: TABLE DATA; Schema: public; Owner: societe
--

COPY public.categorie (id, categorieid, nomcategorie) FROM stdin;
1	CT001	Technology
2	CT002	Sports
3	CT003	Food and Drink
4	CT004	Travel
5	CT005	Fashion
\.


--
-- Name: article_id_seq; Type: SEQUENCE SET; Schema: public; Owner: societe
--

SELECT pg_catalog.setval('public.article_id_seq', 2, true);


--
-- Name: article_seq; Type: SEQUENCE SET; Schema: public; Owner: societe
--

SELECT pg_catalog.setval('public.article_seq', 2, true);


--
-- Name: categorie_id_seq; Type: SEQUENCE SET; Schema: public; Owner: societe
--

SELECT pg_catalog.setval('public.categorie_id_seq', 5, true);


--
-- Name: categorie_seq; Type: SEQUENCE SET; Schema: public; Owner: societe
--

SELECT pg_catalog.setval('public.categorie_seq', 5, true);


--
-- Name: article article_articleid_key; Type: CONSTRAINT; Schema: public; Owner: societe
--

ALTER TABLE ONLY public.article
    ADD CONSTRAINT article_articleid_key UNIQUE (articleid);


--
-- Name: article article_pkey; Type: CONSTRAINT; Schema: public; Owner: societe
--

ALTER TABLE ONLY public.article
    ADD CONSTRAINT article_pkey PRIMARY KEY (id);


--
-- Name: categorie categorie_categorieid_key; Type: CONSTRAINT; Schema: public; Owner: societe
--

ALTER TABLE ONLY public.categorie
    ADD CONSTRAINT categorie_categorieid_key UNIQUE (categorieid);


--
-- Name: categorie categorie_pkey; Type: CONSTRAINT; Schema: public; Owner: societe
--

ALTER TABLE ONLY public.categorie
    ADD CONSTRAINT categorie_pkey PRIMARY KEY (id);


--
-- Name: article article_categorie_fkey; Type: FK CONSTRAINT; Schema: public; Owner: societe
--

ALTER TABLE ONLY public.article
    ADD CONSTRAINT article_categorie_fkey FOREIGN KEY (categorie) REFERENCES public.categorie(id);


--
-- PostgreSQL database dump complete
--

