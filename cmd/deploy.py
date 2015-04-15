#!/usr/bin/python
from os import *
import os
import getpass
import time

root        = '/home/project/release/root'
source 		= 'git@bitbucket.org:tbf_crm/tbf_project.git'
branch      = 'development'

colors = {'red':'\e[91m','blue':'\e[34m','green':'\e[32m','cyan':'\e[36m','yellow':'\e[33m','violet':'\e[35m','white':'\e[97m'};

def run(cmd):
	system(cmd)

def load(commands):
	for cmd in commands:
		run(cmd)

def hide(cmd):
	return cmd + ' > /dev/null'

def echo(cmd = '', color = 'white'):
	return 'echo -e "'+ colors[color] + cmd + '"'

def delete(cmd):
	return 'rm -rf ' + cmd

def create(cmd):
	return 'mkdir -p ' + cmd

def copy(file, destination):
	return 'sudo cp -r '+ file + ' ' + destination

def move(file, destination):
	return 'sudo mv '+ file + ' ' + destination

def writable(cmd):
	return 'chmod a+w -R ' + cmd

def php(cmd):
	return 'php ' + cmd

# TBF DEPLOYMENT ---------------------------------------

def prepare_deploy():

	run(delete(root))
	run(create(root))
	chdir(root)


def get_source_code():

	run(echo('Cloning source code ... ', 'green'))
	run('git archive --remote='+ source +' --format=tar --output="tmp.tar" ' + branch)
	run(echo('Extract files ... ', 'blue'))
	run('tar -xvf tmp.tar > /dev/null')
	run('rm -rf tmp.tar')


def app_configure():

	commands = [
		'curl -sS https://getcomposer.org/installer | php',
		php('composer.phar install'),
		writable('app/cache'),
		writable('app/logs'),
		writable('app/sessions'),
		php('cmd/config/nginx.php ' + root + '/web'),
		copy('cmd/config/release.conf', '/etc/nginx/conf.d/release.conf'),
		copy('cmd/config/database.yml', 'app/config/database.yml'),
		copy('cmd/config/loyalty.yml', 'app/config/loyalty.yml'),
		copy('cmd/config/database.php', 'web/dev/database.php'),
		'sudo service nginx restart'
	]

	load(commands)


def app_cronjob():
	run('chmod +x ./cmd/cron.sh')
	run('./cmd/cron.sh')


def main():
	prepare_deploy()
	get_source_code()
	app_configure()
	app_cronjob()

main()

