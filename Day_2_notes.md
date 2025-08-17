php artisan make:migration create\_posts\_table



php artisan migrate 



https://laravel.com/docs/12.x/migrations#introduction





 **Migrate Options**







\###### \*\*php artisan migrate\*\* 



\&nbsp; Runs all the migrations that haven't been run yet.







\###### \*\*php artisan migrate: fresh\*\*       



drops all tables in the database(without rollback) and then runs all migrations from scratch.







\###### \*\*php artisan migrate: refresh\*\*         



\&nbsp;rolls back all migrations and then runs them again.



\&nbsp;It doesn’t drop the tables directly but uses the migration rollback mechanism.



Options:



--seed → also run the seeders after refreshing.







\###### \*\*php artisan migrate: reset\*\*           



\&nbsp;Rollback all database migrations







\###### \*\*php artisan migrate: rollback\*\* 



Reverses the last "batch" of migrations. (from down method)



Example: If 3 migrations were run together, rollback will undo all 3.



Options:



--step=1 → rollback only the last migration (not the whole batch)







\###### \*\*php artisan migrate: status\*\*       



Show the status of each migration



-------------------------------------------------------------

**DB Fasades**



https://laravel.com/docs/12.x/queries



-------------------------------------------------------------



**Eloquent**



https://laravel.com/docs/12.x/eloquent

php artisan make:model Post -fsrR (factory seeder resource Request)



-----------------------------------------------------------------------		 







