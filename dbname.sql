--
-- PostgreSQL database dump
--

-- Dumped from database version 16.1 (Debian 16.1-1.pgdg120+1)
-- Dumped by pg_dump version 16.1

-- Started on 2024-02-05 08:37:12 UTC

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
-- TOC entry 3462 (class 1262 OID 16384)
-- Name: dbname; Type: DATABASE; Schema: -; Owner: dbuser
--

CREATE DATABASE dbname WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'en_US.utf8';


ALTER DATABASE dbname OWNER TO dbuser;

\connect dbname

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
-- TOC entry 5 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: pg_database_owner
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO pg_database_owner;

--
-- TOC entry 3463 (class 0 OID 0)
-- Dependencies: 5
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: pg_database_owner
--

COMMENT ON SCHEMA public IS 'standard public schema';


--
-- TOC entry 246 (class 1255 OID 16598)
-- Name: getIdFromTableByProperty(character varying, character varying, character varying); Type: FUNCTION; Schema: public; Owner: dbuser
--

CREATE FUNCTION public."getIdFromTableByProperty"(table_name character varying, search_column character varying, search_value character varying) RETURNS integer
    LANGUAGE plpgsql
    AS $_$DECLARE
    result_id INT;
    sql_query TEXT;
BEGIN
	sql_query := 'SELECT id FROM ' || table_name || 'where ' || search_column || ' = $1 ';
    EXECUTE sql_query INTO result_id USING search_value;

    RETURN result_id;
END;
$_$;


ALTER FUNCTION public."getIdFromTableByProperty"(table_name character varying, search_column character varying, search_value character varying) OWNER TO dbuser;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 225 (class 1259 OID 16438)
-- Name: Adresses; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."Adresses" (
    id bigint NOT NULL,
    street character varying NOT NULL,
    postal_code character varying NOT NULL,
    accomodation character varying NOT NULL,
    id_city bigint NOT NULL
);


ALTER TABLE public."Adresses" OWNER TO dbuser;

--
-- TOC entry 224 (class 1259 OID 16437)
-- Name: Adresses_id_seq; Type: SEQUENCE; Schema: public; Owner: dbuser
--

ALTER TABLE public."Adresses" ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public."Adresses_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 221 (class 1259 OID 16422)
-- Name: Category; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."Category" (
    id bigint NOT NULL,
    name character varying NOT NULL
);


ALTER TABLE public."Category" OWNER TO dbuser;

--
-- TOC entry 220 (class 1259 OID 16421)
-- Name: Category_id_seq; Type: SEQUENCE; Schema: public; Owner: dbuser
--

ALTER TABLE public."Category" ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public."Category_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 235 (class 1259 OID 16567)
-- Name: City; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."City" (
    id bigint NOT NULL,
    name character varying NOT NULL
);


ALTER TABLE public."City" OWNER TO dbuser;

--
-- TOC entry 234 (class 1259 OID 16566)
-- Name: City_id_seq; Type: SEQUENCE; Schema: public; Owner: dbuser
--

ALTER TABLE public."City" ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public."City_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 219 (class 1259 OID 16414)
-- Name: Company; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."Company" (
    id bigint NOT NULL,
    name character varying NOT NULL,
    country character varying NOT NULL
);


ALTER TABLE public."Company" OWNER TO dbuser;

--
-- TOC entry 218 (class 1259 OID 16413)
-- Name: Company_id_seq; Type: SEQUENCE; Schema: public; Owner: dbuser
--

ALTER TABLE public."Company" ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public."Company_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 229 (class 1259 OID 16454)
-- Name: List_product_user; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."List_product_user" (
    id bigint NOT NULL,
    id_product bigint NOT NULL,
    id_user bigint NOT NULL
);


ALTER TABLE public."List_product_user" OWNER TO dbuser;

--
-- TOC entry 228 (class 1259 OID 16453)
-- Name: List_product_user_id_seq; Type: SEQUENCE; Schema: public; Owner: dbuser
--

ALTER TABLE public."List_product_user" ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public."List_product_user_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 233 (class 1259 OID 16468)
-- Name: List_shop_likes; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."List_shop_likes" (
    id bigint NOT NULL,
    "like" boolean NOT NULL,
    id_shop bigint NOT NULL,
    id_user bigint NOT NULL
);


ALTER TABLE public."List_shop_likes" OWNER TO dbuser;

--
-- TOC entry 232 (class 1259 OID 16467)
-- Name: List_shop_likes_id_seq; Type: SEQUENCE; Schema: public; Owner: dbuser
--

ALTER TABLE public."List_shop_likes" ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public."List_shop_likes_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 223 (class 1259 OID 16430)
-- Name: Products; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."Products" (
    id bigint NOT NULL,
    name character varying NOT NULL,
    id_category bigint NOT NULL,
    gluten_free boolean NOT NULL,
    vegan boolean NOT NULL,
    vegetarian boolean NOT NULL,
    lactose_free boolean NOT NULL,
    description character varying NOT NULL,
    logo_link character varying DEFAULT '\public\images\sloik.png'::character varying,
    id_company bigint NOT NULL
);


ALTER TABLE public."Products" OWNER TO dbuser;

--
-- TOC entry 222 (class 1259 OID 16429)
-- Name: Products_id_seq; Type: SEQUENCE; Schema: public; Owner: dbuser
--

ALTER TABLE public."Products" ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public."Products_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 231 (class 1259 OID 16460)
-- Name: Shops; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."Shops" (
    id bigint NOT NULL,
    name character varying NOT NULL,
    id_adress bigint NOT NULL,
    google_share_link character varying DEFAULT ''::character varying,
    photo_link character varying DEFAULT '\public\images\sloik.png'::character varying,
    gluten_free boolean NOT NULL,
    vegan boolean NOT NULL,
    vegatarian boolean NOT NULL,
    lactose_free boolean NOT NULL,
    google_embeded_link character varying,
    logo_link character varying
);


ALTER TABLE public."Shops" OWNER TO dbuser;

--
-- TOC entry 230 (class 1259 OID 16459)
-- Name: Shops_id_seq; Type: SEQUENCE; Schema: public; Owner: dbuser
--

ALTER TABLE public."Shops" ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public."Shops_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 227 (class 1259 OID 16446)
-- Name: User_type; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."User_type" (
    id bigint NOT NULL,
    name character varying NOT NULL,
    value integer NOT NULL
);


ALTER TABLE public."User_type" OWNER TO dbuser;

--
-- TOC entry 226 (class 1259 OID 16445)
-- Name: User_type_id_seq; Type: SEQUENCE; Schema: public; Owner: dbuser
--

ALTER TABLE public."User_type" ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public."User_type_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 217 (class 1259 OID 16406)
-- Name: Users; Type: TABLE; Schema: public; Owner: dbuser
--

CREATE TABLE public."Users" (
    id bigint NOT NULL,
    email character varying NOT NULL,
    password character varying NOT NULL,
    name character varying NOT NULL,
    surname character varying NOT NULL,
    id_user_type bigint NOT NULL,
    logo_link character varying DEFAULT '\public\images\profile.png'::character varying,
    premium_ending_date date,
    id_city bigint NOT NULL
);


ALTER TABLE public."Users" OWNER TO dbuser;

--
-- TOC entry 216 (class 1259 OID 16405)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: dbuser
--

ALTER TABLE public."Users" ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 3446 (class 0 OID 16438)
-- Dependencies: 225
-- Data for Name: Adresses; Type: TABLE DATA; Schema: public; Owner: dbuser
--

INSERT INTO public."Adresses" (id, street, postal_code, accomodation, id_city) OVERRIDING SYSTEM VALUE VALUES (1, 'Grodzka', '31-001', '35', 1) ON CONFLICT DO NOTHING;
INSERT INTO public."Adresses" (id, street, postal_code, accomodation, id_city) OVERRIDING SYSTEM VALUE VALUES (2, 'Rynek Główny', '31-042', ' 10', 1) ON CONFLICT DO NOTHING;
INSERT INTO public."Adresses" (id, street, postal_code, accomodation, id_city) OVERRIDING SYSTEM VALUE VALUES (3, 'Mikołajska', '31-027', '3', 1) ON CONFLICT DO NOTHING;
INSERT INTO public."Adresses" (id, street, postal_code, accomodation, id_city) OVERRIDING SYSTEM VALUE VALUES (4, 'plac Szczepański', '31-011', '8', 1) ON CONFLICT DO NOTHING;
INSERT INTO public."Adresses" (id, street, postal_code, accomodation, id_city) OVERRIDING SYSTEM VALUE VALUES (5, 'Rynek Główny', '31-008', '17', 1) ON CONFLICT DO NOTHING;
INSERT INTO public."Adresses" (id, street, postal_code, accomodation, id_city) OVERRIDING SYSTEM VALUE VALUES (6, 'Grodzka', '31-006', '9', 1) ON CONFLICT DO NOTHING;
INSERT INTO public."Adresses" (id, street, postal_code, accomodation, id_city) OVERRIDING SYSTEM VALUE VALUES (7, 'Wartka', '80-841', '5', 4) ON CONFLICT DO NOTHING;
INSERT INTO public."Adresses" (id, street, postal_code, accomodation, id_city) OVERRIDING SYSTEM VALUE VALUES (8, 'Elżbietańska', '80-894', '4/8', 4) ON CONFLICT DO NOTHING;


--
-- TOC entry 3442 (class 0 OID 16422)
-- Dependencies: 221
-- Data for Name: Category; Type: TABLE DATA; Schema: public; Owner: dbuser
--

INSERT INTO public."Category" (id, name) OVERRIDING SYSTEM VALUE VALUES (1, 'Vegetables') ON CONFLICT DO NOTHING;
INSERT INTO public."Category" (id, name) OVERRIDING SYSTEM VALUE VALUES (2, 'Fruits') ON CONFLICT DO NOTHING;
INSERT INTO public."Category" (id, name) OVERRIDING SYSTEM VALUE VALUES (3, 'Snacks') ON CONFLICT DO NOTHING;
INSERT INTO public."Category" (id, name) OVERRIDING SYSTEM VALUE VALUES (4, 'Juices') ON CONFLICT DO NOTHING;
INSERT INTO public."Category" (id, name) OVERRIDING SYSTEM VALUE VALUES (5, 'Meat') ON CONFLICT DO NOTHING;
INSERT INTO public."Category" (id, name) OVERRIDING SYSTEM VALUE VALUES (6, 'Preserves') ON CONFLICT DO NOTHING;
INSERT INTO public."Category" (id, name) OVERRIDING SYSTEM VALUE VALUES (7, 'Grain') ON CONFLICT DO NOTHING;
INSERT INTO public."Category" (id, name) OVERRIDING SYSTEM VALUE VALUES (8, 'Bread') ON CONFLICT DO NOTHING;


--
-- TOC entry 3456 (class 0 OID 16567)
-- Dependencies: 235
-- Data for Name: City; Type: TABLE DATA; Schema: public; Owner: dbuser
--

INSERT INTO public."City" (id, name) OVERRIDING SYSTEM VALUE VALUES (1, 'Kraków') ON CONFLICT DO NOTHING;
INSERT INTO public."City" (id, name) OVERRIDING SYSTEM VALUE VALUES (2, 'Warszawa') ON CONFLICT DO NOTHING;
INSERT INTO public."City" (id, name) OVERRIDING SYSTEM VALUE VALUES (3, 'Poznań') ON CONFLICT DO NOTHING;
INSERT INTO public."City" (id, name) OVERRIDING SYSTEM VALUE VALUES (4, 'Gdańsk') ON CONFLICT DO NOTHING;
INSERT INTO public."City" (id, name) OVERRIDING SYSTEM VALUE VALUES (5, 'Wrocław') ON CONFLICT DO NOTHING;
INSERT INTO public."City" (id, name) OVERRIDING SYSTEM VALUE VALUES (6, 'Kielce') ON CONFLICT DO NOTHING;


--
-- TOC entry 3440 (class 0 OID 16414)
-- Dependencies: 219
-- Data for Name: Company; Type: TABLE DATA; Schema: public; Owner: dbuser
--

INSERT INTO public."Company" (id, name, country) OVERRIDING SYSTEM VALUE VALUES (1, 'Polska Mleczarnia Sp. z o.o.', 'Poland') ON CONFLICT DO NOTHING;
INSERT INTO public."Company" (id, name, country) OVERRIDING SYSTEM VALUE VALUES (2, 'Masarnia Polska S.A.', 'Poland') ON CONFLICT DO NOTHING;
INSERT INTO public."Company" (id, name, country) OVERRIDING SYSTEM VALUE VALUES (3, 'Kawiarnia Smakowita Sp. jawna', 'Poland') ON CONFLICT DO NOTHING;
INSERT INTO public."Company" (id, name, country) OVERRIDING SYSTEM VALUE VALUES (4, 'Polskie Piekarnie Sp. z o.o.', 'Poland') ON CONFLICT DO NOTHING;
INSERT INTO public."Company" (id, name, country) OVERRIDING SYSTEM VALUE VALUES (5, 'Hurtownia Warzyw i Owoców Polskie Smaki', 'Poland') ON CONFLICT DO NOTHING;
INSERT INTO public."Company" (id, name, country) OVERRIDING SYSTEM VALUE VALUES (6, 'Rolnik', 'Poland') ON CONFLICT DO NOTHING;


--
-- TOC entry 3450 (class 0 OID 16454)
-- Dependencies: 229
-- Data for Name: List_product_user; Type: TABLE DATA; Schema: public; Owner: dbuser
--



--
-- TOC entry 3454 (class 0 OID 16468)
-- Dependencies: 233
-- Data for Name: List_shop_likes; Type: TABLE DATA; Schema: public; Owner: dbuser
--



--
-- TOC entry 3444 (class 0 OID 16430)
-- Dependencies: 223
-- Data for Name: Products; Type: TABLE DATA; Schema: public; Owner: dbuser
--

INSERT INTO public."Products" (id, name, id_category, gluten_free, vegan, vegetarian, lactose_free, description, logo_link, id_company) OVERRIDING SYSTEM VALUE VALUES (99, 'Cytryny', 2, true, false, true, false, 'Dobre, kwaśne', '/public/images/products/cytryny.jpg', 5) ON CONFLICT DO NOTHING;
INSERT INTO public."Products" (id, name, id_category, gluten_free, vegan, vegetarian, lactose_free, description, logo_link, id_company) OVERRIDING SYSTEM VALUE VALUES (101, 'Konserwa turystyczna', 5, false, false, false, false, 'Konserwa turystyczna. Zawiera mięso (50%)', '/public/images/products/konserwa.jpg', 6) ON CONFLICT DO NOTHING;
INSERT INTO public."Products" (id, name, id_category, gluten_free, vegan, vegetarian, lactose_free, description, logo_link, id_company) OVERRIDING SYSTEM VALUE VALUES (61, 'Kabanosy Polskie', 5, false, false, false, false, 'Tradycyjne kabanosy, idealne na przekąskę.', '/public/images/products/kabanosy_polskie.jpg', 1) ON CONFLICT DO NOTHING;
INSERT INTO public."Products" (id, name, id_category, gluten_free, vegan, vegetarian, lactose_free, description, logo_link, id_company) OVERRIDING SYSTEM VALUE VALUES (62, 'Pierogi z Mięsem', 6, false, false, false, false, 'Pierogi z mięsem wieprzowym, gotowe do ugotowania.', '/public/images/products/pierogi_z_miesem.jpg', 2) ON CONFLICT DO NOTHING;
INSERT INTO public."Products" (id, name, id_category, gluten_free, vegan, vegetarian, lactose_free, description, logo_link, id_company) OVERRIDING SYSTEM VALUE VALUES (63, 'Jogurt Naturalny', 4, true, true, true, false, 'Naturalny jogurt bez dodatku cukru, doskonały na śniadanie.', '/public/images/products/jogurt_naturalny.jpg', 3) ON CONFLICT DO NOTHING;
INSERT INTO public."Products" (id, name, id_category, gluten_free, vegan, vegetarian, lactose_free, description, logo_link, id_company) OVERRIDING SYSTEM VALUE VALUES (64, 'Chleb Razowy', 8, false, false, true, false, 'Chleb razowy, pełnoziarnisty i zdrowy.', '/public/images/products/chleb_razowy.jpg', 1) ON CONFLICT DO NOTHING;
INSERT INTO public."Products" (id, name, id_category, gluten_free, vegan, vegetarian, lactose_free, description, logo_link, id_company) OVERRIDING SYSTEM VALUE VALUES (65, 'Ser Biały Gouda', 4, false, false, true, true, 'Delikatny ser biały typu Gouda, świetny do kanapek.', '/public/images/products/ser_bialy_gouda.jpg', 2) ON CONFLICT DO NOTHING;
INSERT INTO public."Products" (id, name, id_category, gluten_free, vegan, vegetarian, lactose_free, description, logo_link, id_company) OVERRIDING SYSTEM VALUE VALUES (66, 'Masło Polskie', 4, false, false, false, true, 'Tradycyjne masło o wysokiej jakości, świetne do smarowania chleba.', '/public/images/products/maslo_polskie.jpg', 3) ON CONFLICT DO NOTHING;
INSERT INTO public."Products" (id, name, id_category, gluten_free, vegan, vegetarian, lactose_free, description, logo_link, id_company) OVERRIDING SYSTEM VALUE VALUES (67, 'Kapusta Kiszona', 1, true, true, true, true, 'Naturalnie kiszona kapusta, doskonała do bigosu.', '/public/images/products/kapusta_kiszona.jpg', 1) ON CONFLICT DO NOTHING;
INSERT INTO public."Products" (id, name, id_category, gluten_free, vegan, vegetarian, lactose_free, description, logo_link, id_company) OVERRIDING SYSTEM VALUE VALUES (68, 'Pomidory Malinowe', 1, true, true, true, true, 'Słodkie pomidory malinowe, idealne do sałatek.', '/public/images/products/pomidory_malinowe.jpg', 2) ON CONFLICT DO NOTHING;
INSERT INTO public."Products" (id, name, id_category, gluten_free, vegan, vegetarian, lactose_free, description, logo_link, id_company) OVERRIDING SYSTEM VALUE VALUES (69, 'Kawa Mielona Polska', 7, true, true, true, true, 'Mielona kawa pochodząca z polskich plantacji.', '/public/images/products/kawa_mielona_polska.jpg', 3) ON CONFLICT DO NOTHING;
INSERT INTO public."Products" (id, name, id_category, gluten_free, vegan, vegetarian, lactose_free, description, logo_link, id_company) OVERRIDING SYSTEM VALUE VALUES (70, 'Kurczak Polski', 5, false, false, true, false, 'Kurczak z polskiego fermingu, idealny na obiad.', '/public/images/products/kurczak_polski.jpg', 1) ON CONFLICT DO NOTHING;
INSERT INTO public."Products" (id, name, id_category, gluten_free, vegan, vegetarian, lactose_free, description, logo_link, id_company) OVERRIDING SYSTEM VALUE VALUES (71, 'Piwo Regionalne', 4, false, true, true, true, 'Piwo rzemieślnicze z lokalnej polskiej browarni.', '/public/images/products/piwo_regionalne.jpg', 2) ON CONFLICT DO NOTHING;
INSERT INTO public."Products" (id, name, id_category, gluten_free, vegan, vegetarian, lactose_free, description, logo_link, id_company) OVERRIDING SYSTEM VALUE VALUES (72, 'Mleko Polskie', 4, true, true, true, false, 'Świeże mleko od polskich krów, pełne witamin.', '/public/images/products/mleko_polskie.jpg', 3) ON CONFLICT DO NOTHING;
INSERT INTO public."Products" (id, name, id_category, gluten_free, vegan, vegetarian, lactose_free, description, logo_link, id_company) OVERRIDING SYSTEM VALUE VALUES (73, 'Makaron Polski', 6, false, true, true, false, 'Makaron wyprodukowany w Polsce, szybki do gotowania.', '/public/images/products/makaron_polski.jpg', 1) ON CONFLICT DO NOTHING;
INSERT INTO public."Products" (id, name, id_category, gluten_free, vegan, vegetarian, lactose_free, description, logo_link, id_company) OVERRIDING SYSTEM VALUE VALUES (74, 'Miód Pszczeli Naturalny', 6, true, true, true, true, 'Czysty miód pszczeli z polskich łąk.', '/public/images/products/miod_pszczeli_naturalny.jpg', 2) ON CONFLICT DO NOTHING;
INSERT INTO public."Products" (id, name, id_category, gluten_free, vegan, vegetarian, lactose_free, description, logo_link, id_company) OVERRIDING SYSTEM VALUE VALUES (75, 'Kiełbasa Wiejska', 5, false, false, false, false, 'Wiejska kiełbasa, tradycyjnie wędzona.', '/public/images/products/kielbasa_wiejska.jpg', 3) ON CONFLICT DO NOTHING;
INSERT INTO public."Products" (id, name, id_category, gluten_free, vegan, vegetarian, lactose_free, description, logo_link, id_company) OVERRIDING SYSTEM VALUE VALUES (76, 'Jajka Kurze Krajowe', 5, true, true, true, true, 'Jajka od kur hodowanych w Polsce, wolnowybiegające.', '/public/images/products/jajka_kurze_krajowe.jpg', 1) ON CONFLICT DO NOTHING;
INSERT INTO public."Products" (id, name, id_category, gluten_free, vegan, vegetarian, lactose_free, description, logo_link, id_company) OVERRIDING SYSTEM VALUE VALUES (77, 'Sok Jabłkowy Domowy', 4, true, true, true, true, 'Domowy sok jabłkowy, bez dodatku cukru.', '/public/images/products/sok_jablkowy_domowy.jpg', 2) ON CONFLICT DO NOTHING;
INSERT INTO public."Products" (id, name, id_category, gluten_free, vegan, vegetarian, lactose_free, description, logo_link, id_company) OVERRIDING SYSTEM VALUE VALUES (78, 'Kiszona Ogórkowa', 1, true, true, true, true, 'Zupa kiszona ogórkowa, idealna na zimę.', '/public/images/products/kiszona_ogorkowa.jpg', 3) ON CONFLICT DO NOTHING;
INSERT INTO public."Products" (id, name, id_category, gluten_free, vegan, vegetarian, lactose_free, description, logo_link, id_company) OVERRIDING SYSTEM VALUE VALUES (79, 'Pączki Polskie', 6, false, false, false, false, 'Pączki tradycyjnie przygotowane, idealne na Tłusty Czwartek.', '/public/images/products/paczki_polskie.jpg', 1) ON CONFLICT DO NOTHING;
INSERT INTO public."Products" (id, name, id_category, gluten_free, vegan, vegetarian, lactose_free, description, logo_link, id_company) OVERRIDING SYSTEM VALUE VALUES (80, 'Oliwa Zawierająca Witaminę E', 4, true, true, true, true, 'Oliwa z pierwszego tłoczenia, bogata w witaminę E.', '/public/images/products/oliwa_zawierajaca_witamine_e.jpg', 2) ON CONFLICT DO NOTHING;
INSERT INTO public."Products" (id, name, id_category, gluten_free, vegan, vegetarian, lactose_free, description, logo_link, id_company) OVERRIDING SYSTEM VALUE VALUES (100, 'Wiśnia', 2, true, true, true, true, 'Dobre, kwaśne', '/public/images/products/wisnia.jpg', 5) ON CONFLICT DO NOTHING;


--
-- TOC entry 3452 (class 0 OID 16460)
-- Dependencies: 231
-- Data for Name: Shops; Type: TABLE DATA; Schema: public; Owner: dbuser
--

INSERT INTO public."Shops" (id, name, id_adress, google_share_link, photo_link, gluten_free, vegan, vegatarian, lactose_free, google_embeded_link, logo_link) OVERRIDING SYSTEM VALUE VALUES (10, 'Pierogarnia Mandu', 8, 'https://maps.app.goo.gl/SzSRpAQtvTZGhwru9', '/public/images/shops/pierogarnia_mandu.jpg', true, false, true, false, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2325.1824260536464!2d18.6467672!3d54.3537573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46fd737675a31787%3A0x26ee7846bba773d0!2zUGllcm9nYXJuaWEgTWFuZHUgR2RhxYRzayDFmnLDs2RtaWXFm2NpZQ!5e0!3m2!1spl!2spl!4v1707095052095!5m2!1spl!2spl', '/public/images/shops_logo/mandu.png') ON CONFLICT DO NOTHING;
INSERT INTO public."Shops" (id, name, id_adress, google_share_link, photo_link, gluten_free, vegan, vegatarian, lactose_free, google_embeded_link, logo_link) OVERRIDING SYSTEM VALUE VALUES (6, 'Morskie Oko', 4, 'https://maps.app.goo.gl/t8DrzGL5YobM2Xr99', '/public/images/shops/morskie_oko_sala_fot_schubert  4.jpg', true, false, false, false, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2561.208889303992!2d19.936141000000003!3d50.063649500000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47165be55ed9d1df%3A0x31ba189e5de31515!2sMorskie%20Oko!5e0!3m2!1spl!2spl!4v1706130198364!5m2!1spl!2spl', '/public/images/shops_logo/morskie_oko_logo.png') ON CONFLICT DO NOTHING;
INSERT INTO public."Shops" (id, name, id_adress, google_share_link, photo_link, gluten_free, vegan, vegatarian, lactose_free, google_embeded_link, logo_link) OVERRIDING SYSTEM VALUE VALUES (7, 'Szara Gęś w Kuchni', 5, 'https://maps.app.goo.gl/PWzPXx8qZFdYWV8k7', '/public/images/shops/ogród.jpg', false, false, false, true, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2561.377530471657!2d19.934583076413475!3d50.060490971520295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47165b0df50c362d%3A0xcb2052f4351310c!2zU3phcmEgR8SZxZsgdyBLdWNobmk!5e0!3m2!1spl!2spl!4v1706130236342!5m2!1spl!2spl', '/public/images/shops_logo/szara_ges_logo.png') ON CONFLICT DO NOTHING;
INSERT INTO public."Shops" (id, name, id_adress, google_share_link, photo_link, gluten_free, vegan, vegatarian, lactose_free, google_embeded_link, logo_link) OVERRIDING SYSTEM VALUE VALUES (8, 'Chlopskie Jadlo - Traditional Polish Village Cuisine', 6, 'https://maps.app.goo.gl/1dtcKB3ccMBWnqVL9', '/public/images/shops/2023-09-11.jpg', false, false, false, false, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2561.414017759819!2d19.935071876413375!3d50.059807571520196!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47165b127035fb93%3A0x92ffd514f5d0c31c!2zQ2jFgm9wc2tpZSBKYWTFgm8!5e0!3m2!1spl!2spl!4v1706130281392!5m2!1spl!2spl', '/public/images/shops_logo/chlopskie_jadlo_logo.png') ON CONFLICT DO NOTHING;
INSERT INTO public."Shops" (id, name, id_adress, google_share_link, photo_link, gluten_free, vegan, vegatarian, lactose_free, google_embeded_link, logo_link) OVERRIDING SYSTEM VALUE VALUES (9, 'Restauracja Kubicki - Polish and European Dishes', 7, 'https://maps.app.goo.gl/i6Ars78mPahUNKmj7', '/public/images/shops/2023-03-07.jpg', true, false, true, false, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2325.184215782018!2d18.656737876684073!3d54.3537256725986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46fd730b1b2391cb%3A0xf85267a263d37080!2sKubicki!5e0!3m2!1spl!2spl!4v1706130353445!5m2!1spl!2spl', '/public/images/shops_logo/kubicki_logo.jpg') ON CONFLICT DO NOTHING;
INSERT INTO public."Shops" (id, name, id_adress, google_share_link, photo_link, gluten_free, vegan, vegatarian, lactose_free, google_embeded_link, logo_link) OVERRIDING SYSTEM VALUE VALUES (5, 'Moaburger', 3, 'https://maps.app.goo.gl/7webaEbZzND9KucK7', '/public/images/shops/2023-03-31.jpg', false, true, true, true, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2561.333066101997!2d19.93870377641349!3d50.061323771520435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47165b11846a65cf%3A0xcf91cca253004548!2sMoaburger!5e0!3m2!1spl!2spl!4v1706130134248!5m2!1spl!2spl', '/public/images/shops_logo/moaburger_logo.jpg') ON CONFLICT DO NOTHING;
INSERT INTO public."Shops" (id, name, id_adress, google_share_link, photo_link, gluten_free, vegan, vegatarian, lactose_free, google_embeded_link, logo_link) OVERRIDING SYSTEM VALUE VALUES (1, 'Pod Aniołami - Traditional Polish Cuisine', 1, 'https://maps.app.goo.gl/KdeiW1UZyUWee7F8A', '/public/images/shops/2020-09-10.jpg', true, false, false, false, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2561.494508475319!2d19.93515207641333!3d50.05829997151988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47165b12f28fa92b%3A0xaccde78269ce4153!2sRestauracja%20Pod%20Anio%C5%82ami!5e0!3m2!1spl!2spl!4v1706129979642!5m2!1spl!2spl', '/public/images/shops_logo/pod_aniolami_logo.png') ON CONFLICT DO NOTHING;
INSERT INTO public."Shops" (id, name, id_adress, google_share_link, photo_link, gluten_free, vegan, vegatarian, lactose_free, google_embeded_link, logo_link) OVERRIDING SYSTEM VALUE VALUES (4, 'Restauracja Wesele', 2, 'https://maps.app.goo.gl/uo5oDrLXWEQkvCrr9', '/public/images/shops/wesele.jpg', false, true, false, false, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2561.372148645898!2d19.93548297641347!3d50.060591771520365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47165b120efc7a4b%3A0xdbf214bd0545b6d2!2sRestauracja%20Wesele!5e0!3m2!1spl!2spl!4v1706130083234!5m2!1spl!2spl', '/public/images/shops_logo/wesele_logo.png') ON CONFLICT DO NOTHING;


--
-- TOC entry 3448 (class 0 OID 16446)
-- Dependencies: 227
-- Data for Name: User_type; Type: TABLE DATA; Schema: public; Owner: dbuser
--

INSERT INTO public."User_type" (id, name, value) OVERRIDING SYSTEM VALUE VALUES (3, 'admin', 0) ON CONFLICT DO NOTHING;
INSERT INTO public."User_type" (id, name, value) OVERRIDING SYSTEM VALUE VALUES (1, 'standard', 2) ON CONFLICT DO NOTHING;
INSERT INTO public."User_type" (id, name, value) OVERRIDING SYSTEM VALUE VALUES (2, 'premium', 1) ON CONFLICT DO NOTHING;


--
-- TOC entry 3438 (class 0 OID 16406)
-- Dependencies: 217
-- Data for Name: Users; Type: TABLE DATA; Schema: public; Owner: dbuser
--

INSERT INTO public."Users" (id, email, password, name, surname, id_user_type, logo_link, premium_ending_date, id_city) OVERRIDING SYSTEM VALUE VALUES (3, 'jakubkubica@mail.com', '$2y$10$x7HqZXrNol64HYoU8cVw2OKpKGeROpP4/1YHzx1b8S6lG2MQChzN2', 'Henry', 'Kubica', 1, '/public/images/profiles/admin.png', NULL, 1) ON CONFLICT DO NOTHING;
INSERT INTO public."Users" (id, email, password, name, surname, id_user_type, logo_link, premium_ending_date, id_city) OVERRIDING SYSTEM VALUE VALUES (4, 'jankowal@jan.org', '$2y$10$y5Lpt3ZGRtJ8XivhCkDEF.Y1JhSaxseTgfgsZb5JzjNeAOX4HRaZi', 'Jan', 'Kowalski', 2, '/public/images/profiles/profile.png', '2024-02-10', 4) ON CONFLICT DO NOTHING;


--
-- TOC entry 3464 (class 0 OID 0)
-- Dependencies: 224
-- Name: Adresses_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dbuser
--

SELECT pg_catalog.setval('public."Adresses_id_seq"', 8, true);


--
-- TOC entry 3465 (class 0 OID 0)
-- Dependencies: 220
-- Name: Category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dbuser
--

SELECT pg_catalog.setval('public."Category_id_seq"', 12, true);


--
-- TOC entry 3466 (class 0 OID 0)
-- Dependencies: 234
-- Name: City_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dbuser
--

SELECT pg_catalog.setval('public."City_id_seq"', 6, true);


--
-- TOC entry 3467 (class 0 OID 0)
-- Dependencies: 218
-- Name: Company_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dbuser
--

SELECT pg_catalog.setval('public."Company_id_seq"', 6, true);


--
-- TOC entry 3468 (class 0 OID 0)
-- Dependencies: 228
-- Name: List_product_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dbuser
--

SELECT pg_catalog.setval('public."List_product_user_id_seq"', 1, false);


--
-- TOC entry 3469 (class 0 OID 0)
-- Dependencies: 232
-- Name: List_shop_likes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dbuser
--

SELECT pg_catalog.setval('public."List_shop_likes_id_seq"', 1, false);


--
-- TOC entry 3470 (class 0 OID 0)
-- Dependencies: 222
-- Name: Products_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dbuser
--

SELECT pg_catalog.setval('public."Products_id_seq"', 107, true);


--
-- TOC entry 3471 (class 0 OID 0)
-- Dependencies: 230
-- Name: Shops_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dbuser
--

SELECT pg_catalog.setval('public."Shops_id_seq"', 10, true);


--
-- TOC entry 3472 (class 0 OID 0)
-- Dependencies: 226
-- Name: User_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dbuser
--

SELECT pg_catalog.setval('public."User_type_id_seq"', 3, true);


--
-- TOC entry 3473 (class 0 OID 0)
-- Dependencies: 216
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dbuser
--

SELECT pg_catalog.setval('public.users_id_seq', 4, true);


--
-- TOC entry 3273 (class 2606 OID 16444)
-- Name: Adresses Adresses_pkey; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Adresses"
    ADD CONSTRAINT "Adresses_pkey" PRIMARY KEY (id);


--
-- TOC entry 3269 (class 2606 OID 16428)
-- Name: Category Category_pkey; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Category"
    ADD CONSTRAINT "Category_pkey" PRIMARY KEY (id);


--
-- TOC entry 3283 (class 2606 OID 16573)
-- Name: City City_pkey; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."City"
    ADD CONSTRAINT "City_pkey" PRIMARY KEY (id);


--
-- TOC entry 3267 (class 2606 OID 16420)
-- Name: Company Company_pkey; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Company"
    ADD CONSTRAINT "Company_pkey" PRIMARY KEY (id);


--
-- TOC entry 3277 (class 2606 OID 16523)
-- Name: List_product_user List_product_user_pkey; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."List_product_user"
    ADD CONSTRAINT "List_product_user_pkey" PRIMARY KEY (id);


--
-- TOC entry 3281 (class 2606 OID 16548)
-- Name: List_shop_likes List_shop_likes_pkey; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."List_shop_likes"
    ADD CONSTRAINT "List_shop_likes_pkey" PRIMARY KEY (id);


--
-- TOC entry 3271 (class 2606 OID 16516)
-- Name: Products Products_pkey; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Products"
    ADD CONSTRAINT "Products_pkey" PRIMARY KEY (id);


--
-- TOC entry 3279 (class 2606 OID 16555)
-- Name: Shops Shops_pkey; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Shops"
    ADD CONSTRAINT "Shops_pkey" PRIMARY KEY (id);


--
-- TOC entry 3275 (class 2606 OID 16452)
-- Name: User_type User_type_pkey; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."User_type"
    ADD CONSTRAINT "User_type_pkey" PRIMARY KEY (id);


--
-- TOC entry 3265 (class 2606 OID 16412)
-- Name: Users id; Type: CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Users"
    ADD CONSTRAINT id PRIMARY KEY (id);


--
-- TOC entry 3291 (class 2606 OID 16556)
-- Name: Shops id_adresses; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Shops"
    ADD CONSTRAINT id_adresses FOREIGN KEY (id_adress) REFERENCES public."Adresses"(id) ON UPDATE CASCADE ON DELETE RESTRICT NOT VALID;


--
-- TOC entry 3286 (class 2606 OID 16535)
-- Name: Products id_category; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Products"
    ADD CONSTRAINT id_category FOREIGN KEY (id_category) REFERENCES public."Category"(id) ON UPDATE CASCADE ON DELETE RESTRICT NOT VALID;


--
-- TOC entry 3284 (class 2606 OID 16575)
-- Name: Users id_city; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Users"
    ADD CONSTRAINT id_city FOREIGN KEY (id_city) REFERENCES public."City"(id) ON DELETE SET NULL NOT VALID;


--
-- TOC entry 3288 (class 2606 OID 16592)
-- Name: Adresses id_city; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Adresses"
    ADD CONSTRAINT id_city FOREIGN KEY (id_city) REFERENCES public."City"(id) ON UPDATE RESTRICT ON DELETE RESTRICT NOT VALID;


--
-- TOC entry 3287 (class 2606 OID 16517)
-- Name: Products id_company; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Products"
    ADD CONSTRAINT id_company FOREIGN KEY (id_company) REFERENCES public."Company"(id) ON UPDATE CASCADE ON DELETE RESTRICT NOT VALID;


--
-- TOC entry 3289 (class 2606 OID 16529)
-- Name: List_product_user id_product; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."List_product_user"
    ADD CONSTRAINT id_product FOREIGN KEY (id_product) REFERENCES public."Products"(id) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


--
-- TOC entry 3292 (class 2606 OID 16561)
-- Name: List_shop_likes id_shop; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."List_shop_likes"
    ADD CONSTRAINT id_shop FOREIGN KEY (id_shop) REFERENCES public."Shops"(id) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


--
-- TOC entry 3290 (class 2606 OID 16524)
-- Name: List_product_user id_user; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."List_product_user"
    ADD CONSTRAINT id_user FOREIGN KEY (id_user) REFERENCES public."Users"(id) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


--
-- TOC entry 3293 (class 2606 OID 16549)
-- Name: List_shop_likes id_user; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."List_shop_likes"
    ADD CONSTRAINT id_user FOREIGN KEY (id_user) REFERENCES public."Users"(id) ON UPDATE CASCADE ON DELETE CASCADE NOT VALID;


--
-- TOC entry 3285 (class 2606 OID 16483)
-- Name: Users id_user_type; Type: FK CONSTRAINT; Schema: public; Owner: dbuser
--

ALTER TABLE ONLY public."Users"
    ADD CONSTRAINT id_user_type FOREIGN KEY (id_user_type) REFERENCES public."User_type"(id) ON UPDATE CASCADE ON DELETE RESTRICT NOT VALID;


-- Completed on 2024-02-05 08:37:12 UTC

--
-- PostgreSQL database dump complete
--

