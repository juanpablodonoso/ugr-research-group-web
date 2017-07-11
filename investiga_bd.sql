USE investiga;


/*
  Roles del usuario
 */
create table if NOT EXISTS roles (
  rol_id   INT         NOT NULL AUTO_INCREMENT,
  rol_name VARCHAR(20) NOT NULL UNIQUE,
  PRIMARY KEY (rol_id)
)ENGINE=InnoDB;


/*
  Estructura de la tabla usuarios del sistema
*/
CREATE TABLE if NOT EXISTS users (
  user_id    INT          NOT NULL AUTO_INCREMENT,
  name       VARCHAR(50)  NOT NULL,
  subname    VARCHAR(100)          DEFAULT NULL,
  email      VARCHAR(140) NOT NULL UNIQUE,
  nick       VARCHAR(100) NOT NULL UNIQUE,
  passw      VARCHAR(255) NOT NULL,
  created_at TIMESTAMP    NOT NULL DEFAULT current_timestamp,
  img_path   VARCHAR(255)          DEFAULT '/public/assets/img/user.png',
  PRIMARY KEY (user_id)
)ENGINE=InnoDB;


--
-- Roles de usuario --
create table if not EXISTS user_rol (
  rol_id  INT NOT NULL,
  user_id INT NOT NULL,
  PRIMARY KEY (user_id),
  KEY rol_id(rol_id),
  CONSTRAINT rol1 FOREIGN KEY (rol_id) REFERENCES roles (rol_id),
  KEY user_id(user_id),
  CONSTRAINT user1 FOREIGN KEY (user_id) REFERENCES users (user_id)
    ON DELETE CASCADE
)ENGINE=InnoDB;

--
--
-- Miembros del grupo de investigación --
CREATE TABLE IF NOT EXISTS group_members (
  member_id      INT          NOT NULL,
  departamento   VARCHAR(255) NOT NULL,
  telefono       VARCHAR(12)  NOT NULL,
  university     VARCHAR(100) NOT NULL,
  center         VARCHAR(100) NOT NULL,
  legal_addres   VARCHAR(140),
  personal_url   VARCHAR(140),
  group_director BOOLEAN,
  PRIMARY KEY (member_id),
  KEY id(member_id),
  CONSTRAINT group_members FOREIGN KEY (member_id) REFERENCES users (user_id)
    ON DELETE CASCADE
)ENGINE=InnoDB;



/* Datos por defecto */

-- Roles disponibles en el sistema -- 
INSERT INTO `roles` (`rol_id`, `rol_name`) VALUES 
(1,'admin'), 
(2,'member');




INSERT INTO `users` (`user_id`, `name`, `subname`, `email`, `nick`,
`passw`, `created_at`) VALUES
  (1, 'pablo', 'donoso', 'juanpablodonoso@correo.ugr.es', 'admin', 'admin', '2016-06-04 17:08:06');

-- Roles de usuarios --
INSERT INTO `user_rol` (`rol_id`, `user_id`) VALUES
  (1,1);


-- Rol : member | Nombre:  Antonio Bailón --
INSERT INTO `users` (`name`, `subname`, `email`, `nick`,
                     `passw` ) VALUES
  ('Antonio', 'Bailon', 'abailon@ugr.es', 'abailon', '1234');

INSERT INTO `user_rol` (`rol_id`, `user_id`) VALUES
  (1, 3);


 INSERT INTO `group_members` (`member_id`, `departamento`, `telefono`, `university`, `center`, `legal_addres`,
                              `personal_url`, `group_director`) VALUES
  (3, 'DECSAI', '95823023', 'University of Granada', 'Edificio Mecenas', 'Calle Falsa s/n, Granada, 18001',
  'www.abailon.ugr.es', false);

