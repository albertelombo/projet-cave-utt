/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  aelom
 * Created: 11 juin 2020
 */

CREATE TABLE offre (
id INTEGER UNSIGNED NOT NULL,
producteur_ide INTEGER UNSIGNED NOT NULL,
intitule VARCHAR(70) NOT NULL,
salaire INTEGER UNSIGNED NOT NULL,
date_publi DATE NOT NULL,
PRIMARY KEY (id) ,
FOREIGN KEY (producteur_ide) REFERENCES producteur(id)
)ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;