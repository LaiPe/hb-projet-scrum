BEGIN;

INSERT INTO "user" (
    "firstname",
    "lastname",
    "email",
    "password",
    "question",
    "answer",
    "pseudo",
    "admin"
) VALUES (
    'Admin',                
    'Admin',                 
    'admin@admin.com',    
    'admin',      
    'Admin',     
    'Admin',      
    'admin',         
    TRUE                   
         
);

COMMIT;