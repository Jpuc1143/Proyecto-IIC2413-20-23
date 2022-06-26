--
-- PostgreSQL database dump
--

-- Dumped from database version 14.2 (Ubuntu 14.2-1.pgdg20.04+1+b1)
-- Dumped by pg_dump version 14.2 (Ubuntu 14.2-1.pgdg20.04+1+b1)

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
-- Name: dblink; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS dblink WITH SCHEMA public;


--
-- Name: EXTENSION dblink; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION dblink IS 'connect to other PostgreSQL databases from within a database';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: aerodromos; Type: TABLE; Schema: public; Owner: grupo20
--

CREATE TABLE public.aerodromos (
    aerodromo_id integer NOT NULL,
    codigo_iata character varying(30),
    codigo_icao character varying(30),
    nombre character varying(100),
    coordenada_id integer,
    ciudad_id integer
);


ALTER TABLE public.aerodromos OWNER TO grupo20;

--
-- Name: aeronave; Type: TABLE; Schema: public; Owner: grupo20
--

CREATE TABLE public.aeronave (
    aeronave_id integer NOT NULL,
    nombre_aeronave character varying(100),
    modelo_aeronave character varying(100),
    peso_aeronave double precision,
    codigo_aeronave character varying(30)
);


ALTER TABLE public.aeronave OWNER TO grupo20;

--
-- Name: certificado; Type: TABLE; Schema: public; Owner: grupo20
--

CREATE TABLE public.certificado (
    certificado_id integer NOT NULL,
    fecha_habilitacion date,
    fecha_termino date,
    aeronave_id integer
);


ALTER TABLE public.certificado OWNER TO grupo20;

--
-- Name: ciudad; Type: TABLE; Schema: public; Owner: grupo20
--

CREATE TABLE public.ciudad (
    ciudad_id integer NOT NULL,
    nombre_ciudad character varying(100),
    pais_id integer
);


ALTER TABLE public.ciudad OWNER TO grupo20;

--
-- Name: compania; Type: TABLE; Schema: public; Owner: grupo20
--

CREATE TABLE public.compania (
    compania_id integer NOT NULL,
    nombre_compania character varying(100),
    codigo_compania character varying(100)
);


ALTER TABLE public.compania OWNER TO grupo20;

--
-- Name: coordenada; Type: TABLE; Schema: public; Owner: grupo20
--

CREATE TABLE public.coordenada (
    coordenada_id integer NOT NULL,
    latitud double precision,
    longitud double precision
);


ALTER TABLE public.coordenada OWNER TO grupo20;

--
-- Name: fpl; Type: TABLE; Schema: public; Owner: grupo20
--

CREATE TABLE public.fpl (
    fpl_id integer NOT NULL,
    ruta_id integer,
    velocidad double precision,
    altitud double precision,
    tipo character varying(100),
    max_pasajeros integer,
    realizado character varying(30),
    licencia_id_piloto integer,
    licencia_id_copiloto integer,
    vuelo_id integer
);


ALTER TABLE public.fpl OWNER TO grupo20;

--
-- Name: licencia; Type: TABLE; Schema: public; Owner: grupo20
--

CREATE TABLE public.licencia (
    licencia_id integer NOT NULL,
    fecha_habilitacion date,
    fecha_termino date,
    categoria character varying(100),
    pasaporte character varying(30)
);


ALTER TABLE public.licencia OWNER TO grupo20;

--
-- Name: operaciones; Type: TABLE; Schema: public; Owner: grupo20
--

CREATE TABLE public.operaciones (
    operacion_id integer NOT NULL,
    tipo character varying(30) NOT NULL,
    fpl_id integer,
    aerodromo_id integer,
    fecha date,
    puerto_id integer,
    pista_id integer,
    aeronave_id integer
);


ALTER TABLE public.operaciones OWNER TO grupo20;

--
-- Name: pais; Type: TABLE; Schema: public; Owner: grupo20
--

CREATE TABLE public.pais (
    pais_id integer NOT NULL,
    nombre_pais character varying(100)
);


ALTER TABLE public.pais OWNER TO grupo20;

--
-- Name: pista; Type: TABLE; Schema: public; Owner: grupo20
--

CREATE TABLE public.pista (
    pista_id integer NOT NULL,
    codigo_pista character varying(30),
    aerodromo_id integer
);


ALTER TABLE public.pista OWNER TO grupo20;

--
-- Name: propuestas; Type: TABLE; Schema: public; Owner: grupo20
--

CREATE TABLE public.propuestas (
    propuesta_vuelo_id integer NOT NULL,
    fecha_envio date,
    compania_id integer,
    vuelo_id integer
);


ALTER TABLE public.propuestas OWNER TO grupo20;

--
-- Name: puerto; Type: TABLE; Schema: public; Owner: grupo20
--

CREATE TABLE public.puerto (
    puerto_id integer NOT NULL,
    codigo_puerto character varying(30),
    aerodromo_id integer
);


ALTER TABLE public.puerto OWNER TO grupo20;

--
-- Name: ruta; Type: TABLE; Schema: public; Owner: grupo20
--

CREATE TABLE public.ruta (
    ruta_id integer NOT NULL,
    cardinalidad integer,
    nombre_ruta character varying(100),
    nombre_punto character varying(100),
    coordenada_id integer
);


ALTER TABLE public.ruta OWNER TO grupo20;

--
-- Name: vuelo; Type: TABLE; Schema: public; Owner: grupo20
--

CREATE TABLE public.vuelo (
    vuelo_id integer NOT NULL,
    estado character varying(30),
    codigo character varying(30),
    fecha_salida date,
    fecha_llegada date,
    aerodromo_salida integer,
    aerodromo_llegada integer,
    aeronave_id integer
);


ALTER TABLE public.vuelo OWNER TO grupo20;

--
-- Data for Name: aerodromos; Type: TABLE DATA; Schema: public; Owner: grupo20
--

COPY public.aerodromos (aerodromo_id, codigo_iata, codigo_icao, nombre, coordenada_id, ciudad_id) FROM stdin;
\.


--
-- Data for Name: aeronave; Type: TABLE DATA; Schema: public; Owner: grupo20
--

COPY public.aeronave (aeronave_id, nombre_aeronave, modelo_aeronave, peso_aeronave, codigo_aeronave) FROM stdin;
0	Boeing KC-135	Stratotanker	44.663	PMJDMNY
1	Embraer E190	E190-AR	27.853	HEPBRIE
2	Boeing 737	737-800	41.415	VEMIWPS
3	Airbus A380	A380-700	267	REBDPFN
4	Boeing 747	747-300	178.1	YSLMIYD
5	Eurocopter EC725	Cougar Mk.II	5.505	HNRJJQB
6	Bombardier Global	Global 8000	24.63	RWDSNHW
7	Boeing C-17	Globemaster III	127.913	LNHBEFA
8	Airbus A380	A380-800	276	FSFMKAE
9	Embraer E175	E175-AR	21.906	RHVXKLV
10	Bombardier Global	Global 7500	27.987	WCRZZTI
11	Boeing 747	747-ER	184.6	NLBYLJG
12	Airbus A220	A220-300	37.081	MRUIKBP
13	Boeing 737	737-900ER	44.675	KYKNUTH
14	Boeing 737	737-700	38.15	ECWYCIG
15	Bombardier CRJ	CRJ900	22.48	JQLPBYZ
16	Airbus A380	A380 Prestige	282	WRAPXAO
17	Embraer E175	E175-LR	21.886	DTNMCIK
18	Embraer Legacy	Legacy 450	10.425	CZAGBGC
19	Boeing 737	737-400	33.2	ZQZKYVL
20	Boeing 737	737-600	36.38	BQIKFIC
21	Bombardier CRJ	CRJ700	20.509	NEWSDBH
22	Embraer Praetor	Praetor 600	11.503	WYPTNLZ
23	Embraer E190	E190-LR	27.753	CQRMLHT
24	Boeing 747	747-100	162.4	ALYMGWS
25	Embraer Legacy	Legacy 500	10.75	RVWDIMC
26	Embraer Praetor	Praetor 500	10.391	CMUZMTA
27	Embraer Phenom	300E	5.349	GNTSGWH
28	Boeing 747	747-200B	174	AMJXYDC
29	Boeing 747	747-400	178.75	HVKSCXU
30	Airbus A380	A380-800F	252	PNILCYN
31	Airbus A220	A220-100	35.221	OJFBABA
32	Airbus A350	A350-900	104.6	HTJXZZO
33	Boeing 737	737-500	31.3	KDFWVBZ
34	Boeing 737	737-200	28.12	TPUYDBP
\.


--
-- Data for Name: certificado; Type: TABLE DATA; Schema: public; Owner: grupo20
--

COPY public.certificado (certificado_id, fecha_habilitacion, fecha_termino, aeronave_id) FROM stdin;
4459	2022-02-20	2024-02-20	0
4826	2023-02-21	2025-02-20	1
4421	2022-02-20	2024-02-20	2
123	2021-02-19	2023-02-19	3
1989	2023-02-21	2025-02-20	4
1643	2022-02-20	2024-02-20	5
694	2023-02-21	2025-02-20	6
4030	2021-02-19	2023-02-19	7
4278	2022-02-20	2024-02-20	3
2747	2022-02-20	2024-02-20	8
3815	2023-02-21	2025-02-20	9
3295	2022-02-20	2024-02-20	9
1427	2023-02-21	2025-02-20	3
4559	2022-02-20	2024-02-20	10
3506	2023-02-21	2025-02-20	8
487	2021-02-19	2023-02-19	1
62	2022-02-20	2024-02-20	11
2340	2021-02-19	2023-02-19	8
422	2021-02-19	2023-02-19	12
4804	2021-02-19	2023-02-19	11
1145	2023-02-21	2025-02-20	13
1018	2021-02-19	2023-02-19	6
4069	2021-02-19	2023-02-19	14
3236	2022-02-20	2024-02-20	15
2387	2021-02-19	2023-02-19	0
3252	2022-02-20	2024-02-20	16
1086	2023-02-21	2025-02-20	17
4720	2022-02-20	2024-02-20	18
3829	2021-02-19	2023-02-19	19
849	2022-02-20	2024-02-20	20
483	2023-02-21	2025-02-20	11
3678	2022-02-20	2024-02-20	21
4002	2023-02-21	2025-02-20	22
3948	2023-02-21	2025-02-20	7
2780	2023-02-21	2025-02-20	23
3667	2021-02-19	2023-02-19	16
2695	2021-02-19	2023-02-19	24
1220	2023-02-21	2025-02-20	25
1801	2022-02-20	2024-02-20	12
1419	2023-02-21	2025-02-20	5
3225	2023-02-21	2025-02-20	15
1175	2021-02-19	2023-02-19	4
3699	2022-02-20	2024-02-20	19
529	2021-02-19	2023-02-19	18
2853	2023-02-21	2025-02-20	26
848	2022-02-20	2024-02-20	23
3247	2022-02-20	2024-02-20	7
4751	2023-02-21	2025-02-20	27
4079	2022-02-20	2024-02-20	28
4392	2022-02-20	2024-02-20	1
361	2022-02-20	2024-02-20	25
287	2022-02-20	2024-02-20	26
4600	2021-02-19	2023-02-19	13
3596	2021-02-19	2023-02-19	5
532	2023-02-21	2025-02-20	29
4247	2022-02-20	2024-02-20	24
4674	2021-02-19	2023-02-19	30
57	2023-02-21	2025-02-20	24
829	2021-02-19	2023-02-19	31
215	2022-02-20	2024-02-20	13
3802	2022-02-20	2024-02-20	29
2414	2022-02-20	2024-02-20	31
2548	2023-02-21	2025-02-20	21
3989	2021-02-19	2023-02-19	15
3061	2021-02-19	2023-02-19	27
3345	2023-02-21	2025-02-20	0
3256	2022-02-20	2024-02-20	32
217	2021-02-19	2023-02-19	23
817	2023-02-21	2025-02-20	31
1012	2023-02-21	2025-02-20	16
1286	2023-02-21	2025-02-20	2
3471	2023-02-21	2025-02-20	18
1096	2022-02-20	2024-02-20	27
1153	2022-02-20	2024-02-20	30
2573	2023-02-21	2025-02-20	30
4652	2022-02-20	2024-02-20	33
4413	2021-02-19	2023-02-19	22
4306	2023-02-21	2025-02-20	14
4194	2021-02-19	2023-02-19	21
1723	2023-02-21	2025-02-20	19
1809	2023-02-21	2025-02-20	28
4294	2022-02-20	2024-02-20	22
1886	2023-02-21	2025-02-20	12
1652	2021-02-19	2023-02-19	29
186	2022-02-20	2024-02-20	4
3799	2021-02-19	2023-02-19	17
89	2021-02-19	2023-02-19	26
428	2021-02-19	2023-02-19	25
2134	2023-02-21	2025-02-20	34
283	2022-02-20	2024-02-20	17
3209	2021-02-19	2023-02-19	20
206	2023-02-21	2025-02-20	32
3154	2021-02-19	2023-02-19	28
1761	2023-02-21	2025-02-20	10
2722	2021-02-19	2023-02-19	9
4942	2023-02-21	2025-02-20	33
1807	2023-02-21	2025-02-20	20
4060	2022-02-20	2024-02-20	34
1106	2021-02-19	2023-02-19	2
2757	2021-02-19	2023-02-19	32
2369	2022-02-20	2024-02-20	6
372	2021-02-19	2023-02-19	33
3009	2022-02-20	2024-02-20	14
2785	2021-02-19	2023-02-19	34
2169	2021-02-19	2023-02-19	10
\.


--
-- Data for Name: ciudad; Type: TABLE DATA; Schema: public; Owner: grupo20
--

COPY public.ciudad (ciudad_id, nombre_ciudad, pais_id) FROM stdin;
\.


--
-- Data for Name: compania; Type: TABLE DATA; Schema: public; Owner: grupo20
--

COPY public.compania (compania_id, nombre_compania, codigo_compania) FROM stdin;
0	LAW	LAW
1	OCEANAIR	COG
2	UNITED	UAN
3	LACSA	LRC
4	LATAM CARGO	UCA
5	AEROVIAS DAP (centro/norte)	ADC
6	LATAM INTER	LAT
7	KALITTA AIR	KAI
8	LATAM DOMESTICO	LUD
9	ETHOPIAN AIRLINES	ETA
10	QANTAS	QAF
11	LATAM ECUADOR	XLE
12	KOREAN AIR	KEA
13	NO_COMPANY	NCY
14	MARTINAIR HOLLAND	MPH
15	EASTERN AIRLINES	EAL
16	BRITISH	BTA
17	ALITALIA	AZI
18	IBERIA	IBE
19	LATAM ARGENTINA	LAM
\.


--
-- Data for Name: coordenada; Type: TABLE DATA; Schema: public; Owner: grupo20
--

COPY public.coordenada (coordenada_id, latitud, longitud) FROM stdin;
0	89.8	171.2
1	18.1	123.4
2	70.1	56.3
3	157.2	26.7
4	159.3	167.2
5	103.8	107.6
6	92.2	129.6
7	43	118.1
8	133.5	57.9
9	37.1	60.9
10	144	165.7
11	159.1	71.9
12	45.1	142.8
13	104	154.4
14	22.5	59.4
15	156.8	54.8
16	72.4	102.6
17	40.2	41.8
18	153.9	115.7
19	96.1	8.4
20	149.9	125.7
21	14.7	51.2
22	142.6	4.1
23	6.8	90.3
24	66.4	148
25	54.2	174.5
26	152.5	76.9
27	173.5	5.6
28	62.2	148.1
29	47.4	157.1
30	147.2	49.6
31	52.7	165.2
32	19.5	53.9
33	17.9	177.8
34	75.4	106.5
35	166.5	51
36	103.3	99.4
37	153.8	40.2
38	27.3	111.1
39	-38.915556	-72.252222
40	-27.675556	-108.439444
41	-32.9441666666667	-71.4702777777778
42	-23.143889	-68.805
43	-23.151944	-68.553056
44	-45.268611	-71.955
45	-45.913056	-71.7125
46	-34.584722	-70.622778
47	-43.280278	-72.974444
48	-42.591944	-73.228333
49	-44.098889	-72.380833
50	-52	-71.31
51	-37.353156	-72.419825
52	-31.416667	-90
53	-24.291667	-67.979167
54	-33.401844	-70.642517
55	-43.275278	-72.670556
56	-38.931111	-71.433611
57	-32.375	-70.225
58	-21.866667	-68.0625
\.


--
-- Data for Name: fpl; Type: TABLE DATA; Schema: public; Owner: grupo20
--

COPY public.fpl (fpl_id, ruta_id, velocidad, altitud, tipo, max_pasajeros, realizado, licencia_id_piloto, licencia_id_copiloto, vuelo_id) FROM stdin;
\.


--
-- Data for Name: licencia; Type: TABLE DATA; Schema: public; Owner: grupo20
--

COPY public.licencia (licencia_id, fecha_habilitacion, fecha_termino, categoria, pasaporte) FROM stdin;
19	2020-06-19	2022-06-19	piloto comercial	G16561693
12	2020-06-17	2022-06-17	piloto privado	S26547035
13	2018-06-12	2020-06-11	piloto comercial	L01109034
49	2022-06-21	2024-06-21	piloto comercial	V51246373
29	2020-06-19	2022-06-19	piloto comercial	F40422038
35	2020-06-18	2022-06-18	piloto comercial	B96464671
6	2020-06-19	2022-06-19	piloto comercial	L01109034
30	2019-02-07	2021-02-06	piloto comercial	H50641909
20	2018-06-16	2020-06-15	piloto comercial	C02131672
40	2022-02-20	2024-02-20	piloto aviador militar	O88716397
14	2019-04-23	2021-04-22	piloto comercial	O88716397
11	2021-06-02	2023-06-02	piloto comercial	A35692355
5	2018-05-21	2020-05-20	piloto comercial	Q46419538
41	2020-06-19	2022-06-19	piloto privado	C02131672
37	2020-09-08	2022-09-08	piloto comercial	L89163667
45	2021-06-01	2023-06-01	piloto comercial	J22810925
17	2021-02-19	2023-02-19	piloto privado	A85793465
47	2020-06-19	2022-06-19	piloto comercial	E10934506
46	2020-06-17	2022-06-17	piloto comercial	S26547035
43	2020-06-19	2022-06-19	piloto privado	L91489362
44	2020-12-25	2022-12-25	piloto privado	H06267236
34	2019-06-01	2021-05-31	piloto privado	J22810925
9	2018-05-20	2020-05-19	piloto comercial	Q49180524
16	2018-05-28	2020-05-27	piloto comercial	I74549867
2	2020-06-18	2022-06-18	piloto comercial	C02131672
22	2021-02-07	2023-02-07	piloto comercial	H50641909
21	2019-02-19	2021-02-18	piloto privado	A85793465
4	2018-06-08	2020-06-07	piloto comercial	V51246373
32	2020-06-18	2022-06-18	piloto aviador militar	L91489362
39	2018-05-19	2020-05-18	piloto privado	S26547035
50	2022-06-21	2024-06-21	piloto comercial	L01109034
8	2018-09-08	2020-09-07	piloto comercial	L89163667
33	2018-06-10	2020-06-09	piloto comercial	F40422038
51	2021-02-07	2023-02-07	piloto privado	H50641909
42	2020-06-19	2022-06-19	piloto comercial	L91489362
15	2021-06-01	2023-06-01	piloto privado	J22810925
26	2020-12-25	2022-12-25	piloto aviador militar	H06267236
1	2019-04-06	2021-04-05	piloto comercial	O98651462
23	2019-06-02	2021-06-01	piloto comercial	A35692355
0	2020-06-19	2022-06-19	piloto comercial	Q49180524
10	2018-06-11	2020-06-10	piloto comercial	G16561693
38	2018-05-25	2020-05-24	piloto comercial	B96464671
18	2018-06-15	2020-06-14	piloto privado	E10934506
28	2020-06-19	2022-06-19	piloto comercial	I74549867
31	2021-04-23	2023-04-23	piloto comercial	O88716397
3	2018-05-26	2020-05-25	piloto aviador militar	L91489362
7	2020-06-19	2022-06-19	piloto comercial	Q46419538
53	2020-06-19	2022-06-19	piloto comercial	L91489362
25	2021-04-06	2023-04-06	piloto comercial	O98651462
27	2018-12-25	2020-12-24	piloto aviador militar	H06267236
48	2021-02-23	2023-02-23	piloto comercial	A85793465
52	2020-12-25	2022-12-25	piloto comercial	H06267236
24	2020-06-19	2022-06-19	piloto comercial	V51246373
36	2020-06-19	2022-06-19	piloto privado	E10934506
\.


--
-- Data for Name: operaciones; Type: TABLE DATA; Schema: public; Owner: grupo20
--

COPY public.operaciones (operacion_id, tipo, fpl_id, aerodromo_id, fecha, puerto_id, pista_id, aeronave_id) FROM stdin;
\.


--
-- Data for Name: pais; Type: TABLE DATA; Schema: public; Owner: grupo20
--

COPY public.pais (pais_id, nombre_pais) FROM stdin;
\.


--
-- Data for Name: pista; Type: TABLE DATA; Schema: public; Owner: grupo20
--

COPY public.pista (pista_id, codigo_pista, aerodromo_id) FROM stdin;
\.


--
-- Data for Name: propuestas; Type: TABLE DATA; Schema: public; Owner: grupo20
--

COPY public.propuestas (propuesta_vuelo_id, fecha_envio, compania_id, vuelo_id) FROM stdin;
\.


--
-- Data for Name: puerto; Type: TABLE DATA; Schema: public; Owner: grupo20
--

COPY public.puerto (puerto_id, codigo_puerto, aerodromo_id) FROM stdin;
\.


--
-- Data for Name: ruta; Type: TABLE DATA; Schema: public; Owner: grupo20
--

COPY public.ruta (ruta_id, cardinalidad, nombre_ruta, nombre_punto, coordenada_id) FROM stdin;
\.


--
-- Data for Name: vuelo; Type: TABLE DATA; Schema: public; Owner: grupo20
--

COPY public.vuelo (vuelo_id, estado, codigo, fecha_salida, fecha_llegada, aerodromo_salida, aerodromo_llegada, aeronave_id) FROM stdin;
\.


--
-- Name: aerodromos aerodromos_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.aerodromos
    ADD CONSTRAINT aerodromos_pkey PRIMARY KEY (aerodromo_id);


--
-- Name: aeronave aeronave_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.aeronave
    ADD CONSTRAINT aeronave_pkey PRIMARY KEY (aeronave_id);


--
-- Name: certificado certificado_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.certificado
    ADD CONSTRAINT certificado_pkey PRIMARY KEY (certificado_id);


--
-- Name: ciudad ciudad_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.ciudad
    ADD CONSTRAINT ciudad_pkey PRIMARY KEY (ciudad_id);


--
-- Name: compania compania_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.compania
    ADD CONSTRAINT compania_pkey PRIMARY KEY (compania_id);


--
-- Name: coordenada coordenada_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.coordenada
    ADD CONSTRAINT coordenada_pkey PRIMARY KEY (coordenada_id);


--
-- Name: fpl fpl_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.fpl
    ADD CONSTRAINT fpl_pkey PRIMARY KEY (fpl_id);


--
-- Name: licencia licencia_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.licencia
    ADD CONSTRAINT licencia_pkey PRIMARY KEY (licencia_id);


--
-- Name: operaciones operaciones_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.operaciones
    ADD CONSTRAINT operaciones_pkey PRIMARY KEY (operacion_id, tipo);


--
-- Name: pais pais_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.pais
    ADD CONSTRAINT pais_pkey PRIMARY KEY (pais_id);


--
-- Name: pista pista_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.pista
    ADD CONSTRAINT pista_pkey PRIMARY KEY (pista_id);


--
-- Name: propuestas propuestas_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.propuestas
    ADD CONSTRAINT propuestas_pkey PRIMARY KEY (propuesta_vuelo_id);


--
-- Name: puerto puerto_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.puerto
    ADD CONSTRAINT puerto_pkey PRIMARY KEY (puerto_id);


--
-- Name: ruta ruta_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.ruta
    ADD CONSTRAINT ruta_pkey PRIMARY KEY (ruta_id);


--
-- Name: vuelo vuelo_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.vuelo
    ADD CONSTRAINT vuelo_pkey PRIMARY KEY (vuelo_id);


--
-- Name: aerodromos aerodromos_ciudad_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.aerodromos
    ADD CONSTRAINT aerodromos_ciudad_id_fkey FOREIGN KEY (ciudad_id) REFERENCES public.ciudad(ciudad_id) ON DELETE CASCADE;


--
-- Name: aerodromos aerodromos_coordenada_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.aerodromos
    ADD CONSTRAINT aerodromos_coordenada_id_fkey FOREIGN KEY (coordenada_id) REFERENCES public.coordenada(coordenada_id) ON DELETE CASCADE;


--
-- Name: certificado certificado_aeronave_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.certificado
    ADD CONSTRAINT certificado_aeronave_id_fkey FOREIGN KEY (aeronave_id) REFERENCES public.aeronave(aeronave_id) ON DELETE CASCADE;


--
-- Name: ciudad ciudad_pais_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.ciudad
    ADD CONSTRAINT ciudad_pais_id_fkey FOREIGN KEY (pais_id) REFERENCES public.pais(pais_id) ON DELETE CASCADE;


--
-- Name: fpl fpl_licencia_id_copiloto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.fpl
    ADD CONSTRAINT fpl_licencia_id_copiloto_fkey FOREIGN KEY (licencia_id_copiloto) REFERENCES public.licencia(licencia_id) ON DELETE CASCADE;


--
-- Name: fpl fpl_licencia_id_piloto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.fpl
    ADD CONSTRAINT fpl_licencia_id_piloto_fkey FOREIGN KEY (licencia_id_piloto) REFERENCES public.licencia(licencia_id) ON DELETE CASCADE;


--
-- Name: fpl fpl_ruta_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.fpl
    ADD CONSTRAINT fpl_ruta_id_fkey FOREIGN KEY (ruta_id) REFERENCES public.ruta(ruta_id) ON DELETE CASCADE;


--
-- Name: fpl fpl_vuelo_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.fpl
    ADD CONSTRAINT fpl_vuelo_id_fkey FOREIGN KEY (vuelo_id) REFERENCES public.vuelo(vuelo_id) ON DELETE CASCADE;


--
-- Name: operaciones operaciones_aerodromo_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.operaciones
    ADD CONSTRAINT operaciones_aerodromo_id_fkey FOREIGN KEY (aerodromo_id) REFERENCES public.aerodromos(aerodromo_id) ON DELETE CASCADE;


--
-- Name: operaciones operaciones_aeronave_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.operaciones
    ADD CONSTRAINT operaciones_aeronave_id_fkey FOREIGN KEY (aeronave_id) REFERENCES public.aeronave(aeronave_id) ON DELETE CASCADE;


--
-- Name: operaciones operaciones_fpl_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.operaciones
    ADD CONSTRAINT operaciones_fpl_id_fkey FOREIGN KEY (fpl_id) REFERENCES public.fpl(fpl_id) ON DELETE CASCADE;


--
-- Name: operaciones operaciones_pista_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.operaciones
    ADD CONSTRAINT operaciones_pista_id_fkey FOREIGN KEY (pista_id) REFERENCES public.pista(pista_id) ON DELETE CASCADE;


--
-- Name: operaciones operaciones_puerto_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.operaciones
    ADD CONSTRAINT operaciones_puerto_id_fkey FOREIGN KEY (puerto_id) REFERENCES public.puerto(puerto_id) ON DELETE CASCADE;


--
-- Name: pista pista_aerodromo_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.pista
    ADD CONSTRAINT pista_aerodromo_id_fkey FOREIGN KEY (aerodromo_id) REFERENCES public.aerodromos(aerodromo_id) ON DELETE CASCADE;


--
-- Name: propuestas propuestas_compania_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.propuestas
    ADD CONSTRAINT propuestas_compania_id_fkey FOREIGN KEY (compania_id) REFERENCES public.compania(compania_id) ON DELETE CASCADE;


--
-- Name: propuestas propuestas_vuelo_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.propuestas
    ADD CONSTRAINT propuestas_vuelo_id_fkey FOREIGN KEY (vuelo_id) REFERENCES public.vuelo(vuelo_id) ON DELETE CASCADE;


--
-- Name: puerto puerto_aerodromo_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.puerto
    ADD CONSTRAINT puerto_aerodromo_id_fkey FOREIGN KEY (aerodromo_id) REFERENCES public.aerodromos(aerodromo_id) ON DELETE CASCADE;


--
-- Name: ruta ruta_coordenada_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.ruta
    ADD CONSTRAINT ruta_coordenada_id_fkey FOREIGN KEY (coordenada_id) REFERENCES public.coordenada(coordenada_id) ON DELETE CASCADE;


--
-- Name: vuelo vuelo_aerodromo_llegada_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.vuelo
    ADD CONSTRAINT vuelo_aerodromo_llegada_fkey FOREIGN KEY (aerodromo_llegada) REFERENCES public.aerodromos(aerodromo_id) ON DELETE CASCADE;


--
-- Name: vuelo vuelo_aerodromo_salida_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.vuelo
    ADD CONSTRAINT vuelo_aerodromo_salida_fkey FOREIGN KEY (aerodromo_salida) REFERENCES public.aerodromos(aerodromo_id) ON DELETE CASCADE;


--
-- Name: vuelo vuelo_aeronave_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo20
--

ALTER TABLE ONLY public.vuelo
    ADD CONSTRAINT vuelo_aeronave_id_fkey FOREIGN KEY (aeronave_id) REFERENCES public.aeronave(aeronave_id) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

