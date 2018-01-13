
CREATE INDEX `phone_numbers` USING BTREE ON `phone_numbers`( `user_id` );
ALTER TABLE phone_numbers ADD CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES users(id);


SELECT u.name
FROM users as u
LEFT JOIN phone_numbers as p ON u.id=p.user_id
WHERE u.birth_date < UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 18 YEAR))
AND u.birth_date > UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 22 YEAR))
GROUP by u.name

SELECT COUNT(*) as count
FROM
(SELECT u.name
FROM users as u
LEFT JOIN phone_numbers as p ON u.id=p.user_id
WHERE u.birth_date < UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 18 YEAR))
AND u.birth_date > UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 22 YEAR))
GROUP by u.name, u.birth_date) as q