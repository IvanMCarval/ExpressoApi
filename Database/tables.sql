/*SCRIPT COM O MESMO NOME DA TABELA*/

CREATE DATABASE EXPRESSOAPI;
USE EXPRESSOAPI;

/*Tabela Api*/
CREATE TABLE API(
    ID INT NOT NULL, NAME VARCHAR(50),
    CONSTRAINT PK_API PRIMARY KEY (ID)
);

/*Tabela Client*/
CREATE TABLE CLIENT(
    ID INT NOT NULL, EMAIL VARCHAR(300) NOT NULL,
    PASSWORD VARCHAR(50) NOT NULL, ACCESSTOKEN VARCHAR(100) NOT NULL,
    DOCUMENT VARCHAR(20) NOT NULL, NAME VARCHAR(200) NOT NULL,
    PHONE VARCHAR(20) NOT NULL,
    CONSTRAINT PK_CLIENT PRIMARY KEY (ID)
);

/*Tabela ClientApi*/
CREATE TABLE CLIENTAPI(
    CLIENTID INT NOT NULL, APIID INT NOT NULL,
    USERNAME VARCHAR(300) NOT NULL,
    PASSWORD VARCHAR(100) NOT NULL,
    CONSTRAINT PK_CLIENTAPI_CLIENT_API PRIMARY KEY (CLIENTID,APIID),
    CONSTRAINT FK_CLIENTAPI_CLIENT FOREIGN KEY (CLIENTID) REFERENCES CLIENT(ID),
    CONSTRAINT FK_CLIENTAPI_API FOREIGN KEY (APIID) REFERENCES API(ID)
);

/*Tabela ClientConfiguration*/
CREATE TABLE CLIENTCONFIGURATION(
    CLIENTID INT NOT NULL, SMTPHOST VARCHAR(50) NOT NULL, SMTPUSERNAME VARCHAR(300) NOT NULL,
    SMTPPASSWORD VARCHAR(50) NOT NULL, SMTPPORT INT NOT NULL,
    TRAKINGEMAILTEMPLATE VARCHAR(300),TRAKINGEMAILEVENTTEMPLATE VARCHAR(300),
    CONSTRAINT PK_CLIENTCONFIGURATION PRIMARY KEY (CLIENTID),
    CONSTRAINT FK_CLIENTCONFIGURATION_CLIENT FOREIGN KEY (CLIENTID) REFERENCES CLIENT(ID)
);

/*Tabela Plan*/
CREATE TABLE [PLAN](
    ID INT NOT NULL, NAME VARCHAR(50) NOT NULL,
    REQUESTSQUANTITY INT NOT NULL, PRICE DECIMAL(10,2) NOT NULL,
    CONSTRAINT PK_PLANX PRIMARY KEY (ID)
);

/*Tabela ClientPlanHistory*/
CREATE TABLE CLIENTPLANHISTORY(
    ID INT NOT NULL, CLIENTID INT NOT NULL, PLANID INT NOT NULL,
    [START] DATE NOT NULL, [END] DATE,
    CONSTRAINT PK_CLIENTPLANHISTPRY PRIMARY KEY (ID),
    CONSTRAINT FK_CLIENTPLANHISTPRY_CLIENT FOREIGN KEY (CLIENTID) REFERENCES CLIENT(ID),
    CONSTRAINT FK_CLIENTPLANHISTPRY_PLAN FOREIGN KEY (PLANID) REFERENCES PLANX(ID)
);

/*Tabela ClientPlan*/
CREATE TABLE CLIENTPLAN(
    CLIENTID INT NOT NULL, PLANID INT NOT NULL, 
    SMSCREDITS INT NOT NULL,
    CONSTRAINT PK_CLIENTPLAN_CLIENT PRIMARY KEY (PLANID,CLIENTID),
    CONSTRAINT FK_CLIENTPLAN_CLIENT FOREIGN KEY (CLIENTID) REFERENCES CLIENT(ID),
    CONSTRAINT FK_CLIENTPLAN_PLAN FOREIGN KEY (PLANID) REFERENCES PLANX(ID)
);

/*Tabela ClientApiRequest*/
CREATE TABLE CLIENTAPIREQUEST(
    ID INT NOT NULL, CLIENTID INT NOT NULL,
    DTREQUEST DATE NOT NULL, URL VARCHAR(300) NOT NULL, BODY VARCHAR(300) NOT NULL,
    RESPONSESTATUS INT NOT NULL,  RESPONSEBODY VARCHAR(300) NOT NULL,
    POSTACTIONS VARCHAR(300) NOT NULL,TYPE VARCHAR(20) NOT NULL,
    CONSTRAINT PK_CLIENTAPIREQUEST PRIMARY KEY (ID),
    CONSTRAINT FK_CLIENTAPIREQUEST_CLIENT FOREIGN KEY (CLIENTID) REFERENCES CLIENT(ID)
);