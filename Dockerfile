FROM python:3.6.5
MAINTAINER vejoiteam vejoiteam@gmail.com
ENV PYTHONUNBUFFERED=1
RUN mkdir /codebase
ADD . /codebase/
WORKDIR /codebase
RUN pip install -r requirement.txt
EXPOSE 80/tcp
CMD python3 manage.py runserver 0.0.0.0:80