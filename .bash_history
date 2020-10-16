cd /etc
cd httpd/
ls
cd conf
ls
cd ..
cd conf.d
ls
cd ..
ls
cd ..
ls
ls htt*
cd httpd/
ls
cd conf
ls
vi httpd.conf
ls
cd ..
ls
cd conf.d
ls
ls -lh
vi php.conf
ls
ls -lh
vi userdir.conf 
ls
vi autoindex.conf 
ls
cd ..
ls
cd conf
ls
ls -lh
vi httpd.conf 
cd ../
cd conf.d/
ls
vi virtual-host.conf
su root
cd /home/power
ls
mkdir public_html
vi index.html
su root
vi index.html
su root
exit
su root
su root
ls
wget https://github.com/gnuboard/gnuboard5/tarball/master
tar xzvfp master 
rm master 
ls
cd gnuboard-gnuboard5-1971be3/
ls
cp -R -p * ../
ls
cd ..
rm -rf gnuboard-gnuboard5-1971be3/
ls
wget https://files.phpmyadmin.net/phpMyAdmin/5.0.3/phpMyAdmin-5.0.3-all-languages.tar.gz
ls
tar xzvfp phpMyAdmin-5.0.3-all-languages.tar.gz 
mv phpMyAdmin-5.0.3-all-languages mydb
ls
rm -rf phpMyAdmin-5.0.3-all-languages.tar.gz 
ls
cd data
ls
mkdir data
chmod 707 data
ls
mysqladmin -u root -p root1234
mysqladmin -u root
mysqladmin -u root -p pasword '1234'
mysql --version
mysql
mysql_secure_installation
su root
cd /home
cd power
ls
ls -la
commit -m 'first commit'
git commit -m 'first commit'
rm -rf .git
ls
git init
ls -la
su root
git init
commit -m 'first commit'
git commit -m 'first commit'
git config --global user.email 'jbsolution@naver.com'
git config --global user.name 'JrLee'
git config --global color.staus=auto
git config user.name
git config --global color.status auto
git config --list
git commit -m 'initial commit'
ls
vi .gitignore 
git add public_html/
git commit -m 'initial commit'
branch -M main
git branch -M main
remove add origin https://github.com/tulboy75/power1.git
git remote add origin https://github.com/tulboy75/power1.git
push -u origin main
git push -u origin main
useradd -m citest
su root
ls
cd power
ls
mv public/ public_html
cd ..
ls
su citest
cd power
ls
mv public_html/ public
su root
