UPDATE "#__extensions" SET "params" = (SELECT "params" FROM "#__extensions" WHERE "name" = 'plg_system_remember') WHERE "name" = 'plg_authentication_cookie';
