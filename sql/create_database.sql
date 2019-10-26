CREATE TABLE check_date_time
(
    'current_date' timestamp without time zone NOT NULL,
    CONSTRAINT check_date_time_pkey PRIMARY KEY ('current_date')
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE check_date_time
    OWNER to ptplxvkmvcsjez;
