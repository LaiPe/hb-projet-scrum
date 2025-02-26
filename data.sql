CREATE DATABASE IF NOT EXISTS db-hb-project-scrum; 

USE db-hb-project-scrum; 

BEGIN;

DROP TABLE IF EXISTS "user_like_collaborator", "comment", "collaborator", "user";

CREATE TABLE "user" (
    "id" INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    "firstname" TEXT,
    "lastname" TEXT,
    "email" TEXT UNIQUE,
    "password" TEXT NOT NULL,
    "question" TEXT,
    "answer" TEXT,
    "pseudo" TEXT NOT NULL UNIQUE,
    "admin" BOOLEAN NOT NULL DEFAULT FALSE,
    "created_at" TIMESTAMPTZ NOT NULL default(now()),
    "updated_at" TIMESTAMPTZ
);

CREATE TABLE "collaborator" (
    "id" INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    "name" TEXT NOT NULL UNIQUE ,
    "description" TEXT NOT NULL UNIQUE ,
    "logo" TEXT NOT NULL UNIQUE,
    "created_at" TIMESTAMPTZ NOT NULL default(now()),
    "updated_at" TIMESTAMPTZ
);

CREATE TABLE "comment" (
    "id" INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    "content" TEXT NOT NULL,
    "user_id" INT NOT NULL REFERENCES "user"("id") ON DELETE CASCADE,
    "collaborator_id"INT NOT NULL REFERENCES "collaborator"("id") ON DELETE CASCADE,
    "created_at" TIMESTAMPTZ NOT NULL default(now()),
    "updated_at" TIMESTAMPTZ
);

CREATE TABLE "user_like_collaborator" (
    "id" INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    "user_id" INT NOT NULL REFERENCES "user"("id") ON DELETE CASCADE,
    "collaborator_id"INT NOT NULL REFERENCES "collaborator"("id") ON DELETE CASCADE,
    "created_at" TIMESTAMPTZ NOT NULL default(now()),
    UNIQUE ("user_id", "collaborator_id")
);
COMMIT;