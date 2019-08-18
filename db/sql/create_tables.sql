-- Table: public.console

-- DROP TABLE public.console;

CREATE TABLE public.console
(
    id serial NOT NULL,
    nome character varying(20) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT console_pkey PRIMARY KEY (id)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.console
    OWNER to postgres;

-- Table: public.videogiochi

-- DROP TABLE public.videogiochi;

CREATE TABLE public.videogiochi
(
    id serial NOT NULL,
    titolo character varying(50) COLLATE pg_catalog."default" NOT NULL,
    descrizione text COLLATE pg_catalog."default",
    produttore character varying(20) COLLATE pg_catalog."default",
    img_path character varying(200) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT videogiochi_pkey PRIMARY KEY (id)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.videogiochi
    OWNER to postgres;

-- Table: public.utenti

-- DROP TABLE public.utenti;

CREATE TABLE public.utenti
(
    id serial NOT NULL,
    username character varying(20) COLLATE pg_catalog."default" NOT NULL,
    password text COLLATE pg_catalog."default" NOT NULL,
    nome character varying(50) COLLATE pg_catalog."default" NOT NULL,
    cognome character varying(50) COLLATE pg_catalog."default" NOT NULL,
    indirizzo character varying(60) COLLATE pg_catalog."default" NOT NULL,
    telefono character varying(15) COLLATE pg_catalog."default" NOT NULL,
    email character varying(20) COLLATE pg_catalog."default" NOT NULL,
    admin boolean NOT NULL,
    CONSTRAINT utenti_pkey PRIMARY KEY (id),
    CONSTRAINT utenti_username_key UNIQUE (username)

)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.utenti
    OWNER to postgres;

-- Table: public.giochi_console

-- DROP TABLE public.giochi_console;

CREATE TABLE public.giochi_console
(
    id serial NOT NULL,
    id_gioco integer NOT NULL,
    id_console integer NOT NULL,
    prezzo real NOT NULL,
    qta integer NOT NULL,
    CONSTRAINT giochi_console_pkey PRIMARY KEY (id),
    CONSTRAINT giochi_console_id_gioco_id_console_key UNIQUE (id_gioco, id_console)
,
    CONSTRAINT giochi_console_id_console_fkey FOREIGN KEY (id_console)
        REFERENCES public.console (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT giochi_console_id_gioco_fkey FOREIGN KEY (id_gioco)
        REFERENCES public.videogiochi (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.giochi_console
    OWNER to postgres;

-- Table: public.ordini

-- DROP TABLE public.ordini;

CREATE TABLE public.ordini
(
    id serial NOT NULL,
    id_utente integer NOT NULL,
    data date NOT NULL,
    tipo_pagamento character varying(50) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT ordini_pkey PRIMARY KEY (id),
    CONSTRAINT ordini_id_utente_fkey FOREIGN KEY (id_utente)
        REFERENCES public.utenti (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.ordini
    OWNER to postgres;

-- Table: public.ordini_giochi

-- DROP TABLE public.ordini_giochi;

CREATE TABLE public.ordini_giochi
(
    id serial NOT NULL,
    id_ordine integer NOT NULL,
    id_gioco_console integer NOT NULL,
    qta integer NOT NULL,
    CONSTRAINT ordini_giochi_pkey PRIMARY KEY (id),
    CONSTRAINT ordini_giochi_id_ordine_id_gioco_console_key UNIQUE (id_ordine, id_gioco_console)
,
    CONSTRAINT ordini_giochi_id_gioco_console_fkey FOREIGN KEY (id_gioco_console)
        REFERENCES public.giochi_console (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT ordini_giochi_id_ordine_fkey FOREIGN KEY (id_ordine)
        REFERENCES public.ordini (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.ordini_giochi
    OWNER to postgres;
