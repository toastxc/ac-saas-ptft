# run
```bash
git clone https://github.com/toastxc/ac-saas-ptft.git
cd ac-saas-ptft/
cp .env.example .env
pnpm i
composer install
php artisan migrate:fresh --seed
composer run dev
