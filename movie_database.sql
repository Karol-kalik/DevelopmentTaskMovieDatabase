--
-- PostgreSQL database dump
--

-- Dumped from database version 12.4
-- Dumped by pg_dump version 12.4

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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: actors; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.actors (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    date timestamp with time zone,
    image character varying(255)
);


ALTER TABLE public.actors OWNER TO postgres;

--
-- Name: actors_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.actors_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.actors_id_seq OWNER TO postgres;

--
-- Name: actors_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.actors_id_seq OWNED BY public.actors.id;


--
-- Name: conector; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.conector (
    id integer NOT NULL,
    actor_id bigint,
    movie_id bigint
);


ALTER TABLE public.conector OWNER TO postgres;

--
-- Name: conector_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.conector_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.conector_id_seq OWNER TO postgres;

--
-- Name: conector_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.conector_id_seq OWNED BY public.conector.id;


--
-- Name: movie; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.movie (
    id integer NOT NULL,
    title character varying(255) NOT NULL,
    year_of_production integer NOT NULL,
    film_genre character varying(255) NOT NULL,
    image character varying(255)
);


ALTER TABLE public.movie OWNER TO postgres;

--
-- Name: movie_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.movie_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.movie_id_seq OWNER TO postgres;

--
-- Name: movie_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.movie_id_seq OWNED BY public.movie.id;


--
-- Name: actors id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.actors ALTER COLUMN id SET DEFAULT nextval('public.actors_id_seq'::regclass);


--
-- Name: conector id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.conector ALTER COLUMN id SET DEFAULT nextval('public.conector_id_seq'::regclass);


--
-- Name: movie id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.movie ALTER COLUMN id SET DEFAULT nextval('public.movie_id_seq'::regclass);


--
-- Data for Name: actors; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.actors VALUES (1, 'Tom Hanks', '1956-07-09 00:00:00+01', 'TomHanks');
INSERT INTO public.actors VALUES (2, 'David Morse', '1953-10-11 00:00:00+01', 'DavidMorse');
INSERT INTO public.actors VALUES (3, 'Bonnie Hunt', '1961-09-22 00:00:00+01', 'BonnieHunt');
INSERT INTO public.actors VALUES (4, 'Tim Robbins', '1958-10-16 00:00:00+01', 'TimRobbins');
INSERT INTO public.actors VALUES (5, 'Morgan Freeman', '1937-06-01 00:00:00+01', 'MorganFreeman');
INSERT INTO public.actors VALUES (6, 'Bob Gunton', '1945-11-15 00:00:00+01', 'BobGunton');
INSERT INTO public.actors VALUES (7, 'Keanu Reeves', '1964-02-08 00:00:00+01', 'KeanuReeves');
INSERT INTO public.actors VALUES (8, 'Laurence Fishburne', '1961-07-30 00:00:00+01', 'LaurenceFishburne');
INSERT INTO public.actors VALUES (9, 'Carrie-Anne Moss', '1967-08-21 00:00:00+01', 'Carrie-AnneMoss');


--
-- Data for Name: conector; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.conector VALUES (1, 1, 1);
INSERT INTO public.conector VALUES (2, 2, 1);
INSERT INTO public.conector VALUES (3, 3, 1);
INSERT INTO public.conector VALUES (4, 4, 2);
INSERT INTO public.conector VALUES (5, 5, 2);
INSERT INTO public.conector VALUES (6, 6, 2);
INSERT INTO public.conector VALUES (7, 7, 3);
INSERT INTO public.conector VALUES (8, 8, 3);
INSERT INTO public.conector VALUES (9, 9, 3);


--
-- Data for Name: movie; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.movie VALUES (1, 'The Green Mile', 1999, 'Drama', 'TheGreenMile');
INSERT INTO public.movie VALUES (2, 'The Shawshank Redemption', 1994, 'Drama', 'TheShawshankRedemption');
INSERT INTO public.movie VALUES (3, 'Matrix', 1999, 'Sci-Fi', 'Matrix');


--
-- Name: actors_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.actors_id_seq', 8, true);


--
-- Name: conector_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.conector_id_seq', 9, true);


--
-- Name: movie_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.movie_id_seq', 3, true);


--
-- Name: actors actors_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.actors
    ADD CONSTRAINT actors_pkey PRIMARY KEY (id);


--
-- Name: conector conector_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.conector
    ADD CONSTRAINT conector_pkey PRIMARY KEY (id);


--
-- Name: movie movie_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.movie
    ADD CONSTRAINT movie_pkey PRIMARY KEY (id);


--
-- Name: conector conector_actor_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.conector
    ADD CONSTRAINT conector_actor_id_fkey FOREIGN KEY (actor_id) REFERENCES public.actors(id);


--
-- Name: conector conector_movie_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.conector
    ADD CONSTRAINT conector_movie_id_fkey FOREIGN KEY (movie_id) REFERENCES public.movie(id);


--
-- PostgreSQL database dump complete
--

