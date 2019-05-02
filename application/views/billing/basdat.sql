-- No 1
DELIMITER //
CREATE OR REPLACE PROCEDURE p_view_admin()
BEGIN
SELECT b.id_billing, u.username, b.duration_first, b.duration_last, b.email, b.name, p.name, p.price
FROM billing b JOIN users u
ON(b.user_id = u.user_id)
JOIN package p
ON(b.id_package = p.id_package)
GROUP BY b.id_billing;
END;//
DELIMITER ;

CALL p_view_admin();

-- No 2
DELIMITER //
CREATE OR REPLACE PROCEDURE p_view_user()
BEGIN
SELECT*FROM billing;
END;//
DELIMITER ;

CALL p_view_user()