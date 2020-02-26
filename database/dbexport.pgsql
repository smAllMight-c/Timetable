--
-- PostgreSQL database dump
--

-- Dumped from database version 12.1
-- Dumped by pg_dump version 12.1

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
-- Name: admin; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.admin (
    username character varying,
    password character varying
);


ALTER TABLE public.admin OWNER TO postgres;

--
-- Name: allot; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.allot (
    did integer,
    semester character varying,
    sid integer,
    tid integer,
    cno integer,
    timeslot character varying,
    day character varying
);


ALTER TABLE public.allot OWNER TO postgres;

--
-- Name: classroom; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.classroom (
    cid integer NOT NULL,
    cno integer
);


ALTER TABLE public.classroom OWNER TO postgres;

--
-- Name: department; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.department (
    did integer NOT NULL,
    name character varying
);


ALTER TABLE public.department OWNER TO postgres;

--
-- Name: slot; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.slot (
    id integer NOT NULL,
    slot character varying
);


ALTER TABLE public.slot OWNER TO postgres;

--
-- Name: slot_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.slot_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.slot_id_seq OWNER TO postgres;

--
-- Name: slot_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.slot_id_seq OWNED BY public.slot.id;


--
-- Name: subjects; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.subjects (
    sid integer NOT NULL,
    sname character varying,
    semester character varying,
    did integer
);


ALTER TABLE public.subjects OWNER TO postgres;

--
-- Name: teacher; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.teacher (
    tid integer NOT NULL,
    name character varying,
    designation character varying,
    contact character varying,
    email character varying,
    did integer
);


ALTER TABLE public.teacher OWNER TO postgres;

--
-- Name: timeslot; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.timeslot (
    "time" character varying
);


ALTER TABLE public.timeslot OWNER TO postgres;

--
-- Name: slot id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.slot ALTER COLUMN id SET DEFAULT nextval('public.slot_id_seq'::regclass);


--
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.admin (username, password) FROM stdin;
admin	1221
\.


--
-- Data for Name: allot; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.allot (did, semester, sid, tid, cno, timeslot, day) FROM stdin;
1	SY	5	1	23	11-11:50	Monday
1	SY	4422	2	24	11:50-12:40	Monday
1	SY	6633	3	44	12:40-1:30	Monday
1	SY	3	33	33	1:30-1:50	Monday
1	SY	3	33	44	11-11:50	Tuesday
1	SY	411	7	44	11:50-12:40	Tuesday
1	SY	3	33	25	12:40-1:30	Tuesday
1	SY	5	1	24	1:30-1:50	Tuesday
1	SY	3	33	24	11-11:50	Wednesday
1	SY	3	33	23	11:50-12:40	Wednesday
1	SY	6633	3	23	12:40-1:30	Wednesday
1	SY	4422	2	24	1:30-1:50	Wednesday
1	SY	3	33	24	11-11:50	Thursday
1	SY	411	7	24	11:50-12:40	Thursday
1	SY	5	1	23	12:40-1:30	Thursday
1	SY	6633	7	25	1:30-1:50	Thursday
1	SY	6633	7	23	11-11:50	Friday
1	SY	411	7	25	11:50-12:40	Friday
1	SY	4422	2	24	12:40-1:30	Friday
1	SY	3	33	24	1:30-1:50	Friday
1	SY	4422	2	23	11-11:50	Saturday
1	SY	3	7	24	11:50-12:40	Saturday
1	SY	5	1	25	12:40-1:30	Saturday
1	SY	411	3	24	1:30-1:50	Saturday
1	FY	1212	1	24	11-11:50	Monday
\.


--
-- Data for Name: classroom; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.classroom (cid, cno) FROM stdin;
1	23
2	24
3	25
4	44
6	33
\.


--
-- Data for Name: department; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.department (did, name) FROM stdin;
1	Computer Science
2	Computer Applications
21	MCAA
3	Computer department
321	Arts
\.


--
-- Data for Name: slot; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.slot (id, slot) FROM stdin;
1	9-10
2	10-10:50
4	11:50-12:40
5	11-11:50
\.


--
-- Data for Name: subjects; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.subjects (sid, sname, semester, did) FROM stdin;
1	Syspro	6	1
2	TCS	5	1
3	Java	6	2
5	Compiler Construction	TY	1
245235	hdfgd	SY	1
2323	Compiler Construction	SY	1
4422	SYSPRO	SY	1
553453	Java	SY	1
6633	PHP	SY	1
411	CN	SY	1
1212	ele	FY	1
\.


--
-- Data for Name: teacher; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.teacher (tid, name, designation, contact, email, did) FROM stdin;
1	All Might	Symbol Of Peace	991929912	allmight@iamhere	1
2	Aizawa	Pro hero	9912129912	aizawa@idontcare.com	1
3	Chaitanya	SMart	91231931	cdssd@ass	1
6	Chaitanya	Professor	923942394	asdas%asdsada	1
7	Naidu	Professor	923942394	asdas%asdsada	1
8	CN	Professor	92asdasd	asdas%asdsada	2
9	CNa	Professor	92asdasd21231	asdas%asdsada221	2
22	Testing	Professor	213123213	abc@gmail	2
33	Chaitanya Viswanathan Naidu	Professor	324234324243	sdfsd@sdfs	1
34	asd	Professor	asda	aaa	2
\.


--
-- Data for Name: timeslot; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.timeslot ("time") FROM stdin;
1:50-2:40
11-11:50
11:50-12:40
12:40-1:30
1:30-1:50
\.


--
-- Name: slot_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.slot_id_seq', 5, true);


--
-- Name: classroom classroom_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.classroom
    ADD CONSTRAINT classroom_pkey PRIMARY KEY (cid);


--
-- Name: department department_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.department
    ADD CONSTRAINT department_pkey PRIMARY KEY (did);


--
-- Name: subjects subjects_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.subjects
    ADD CONSTRAINT subjects_pkey PRIMARY KEY (sid);


--
-- Name: teacher teacher_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.teacher
    ADD CONSTRAINT teacher_pkey PRIMARY KEY (tid);


--
-- Name: allot allot_did_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.allot
    ADD CONSTRAINT allot_did_fkey FOREIGN KEY (did) REFERENCES public.department(did);


--
-- Name: allot allot_sid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.allot
    ADD CONSTRAINT allot_sid_fkey FOREIGN KEY (sid) REFERENCES public.subjects(sid);


--
-- Name: allot allot_tid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.allot
    ADD CONSTRAINT allot_tid_fkey FOREIGN KEY (tid) REFERENCES public.teacher(tid);


--
-- Name: subjects subjects_did_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.subjects
    ADD CONSTRAINT subjects_did_fkey FOREIGN KEY (did) REFERENCES public.department(did);


--
-- Name: teacher teacher_did_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.teacher
    ADD CONSTRAINT teacher_did_fkey FOREIGN KEY (did) REFERENCES public.department(did);


--
-- PostgreSQL database dump complete
--

