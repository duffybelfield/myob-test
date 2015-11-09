FROM ubuntu:latest

EXPOSE 80

# Set timezone
RUN ntpdate -s ntp.ubuntu.com

# Install packages
RUN \
	apt-get -y update && \
	apt-get -y install \
	apache2 \
	tar \
	python-dev \
	python-setuptools \
	php5 \
	php5-mysql \
	php5-mcrypt \
	php5-curl \
	php5-gd	\
	php5-memcache \
	wget && \
	apt-get clean all

RUN a2enmod expires

RUN \
	php5enmod mcrypt && \
	a2enmod rewrite && \
	wget https://bootstrap.pypa.io/get-pip.py -O /tmp/get-pip.py && \
	python /tmp/get-pip.py && \
	pip install setuptools --upgrade

RUN pip install supervisor
RUN mkdir -p /var/log/supervisor
ADD supervisord.conf /etc/supervisord.conf


RUN rm /etc/apache2/sites-available/000-default.conf
ADD site.conf /etc/apache2/sites-available/000-default.conf
ADD myob /app/myob
RUN chmod 777 -R /app/myob/app/storage


ADD run.sh /run.sh
CMD ["/run.sh"]
