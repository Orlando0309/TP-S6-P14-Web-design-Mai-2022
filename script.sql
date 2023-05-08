CREATE SEQUENCE categorie_seq;
CREATE TABLE categorie(
    id serial primary key,
    categorieid varchar(10) default 'CT'|| to_char(nextval('categorie_seq'),'FM000') not null unique,
    nomcategorie varchar(40) not null
);

CREATE SEQUENCE article_seq;
CREATE TABLE article(
    id serial primary key,
    articleid varchar(10) default 'AT'|| to_char(nextval('article_seq'),'FM0000') not null unique,
    titre varchar(30) not null,
    contenu text not null,
    categorie integer references categorie(id)
);

INSERT INTO categorie (nomcategorie) VALUES ('Technology');
INSERT INTO categorie (nomcategorie) VALUES ('Sports');
INSERT INTO categorie (nomcategorie) VALUES ('Food and Drink');
INSERT INTO categorie (nomcategorie) VALUES ('Travel');
INSERT INTO categorie (nomcategorie) VALUES ('Fashion');

CREATE TABLE public.administrateur (
	id serial NULL,
	identifiant varchar(40) NOT NULL,
	"password" varchar(100) NOT NULL,
	nom varchar NULL,
	CONSTRAINT administrateur_pk PRIMARY KEY (id)
);
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
