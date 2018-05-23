From python:3.6.5
MAINTAINER TaiLouis vuductaiptit@gmail.com
ENV PYTHONUNBUFFERED=1
Run mkdir /codebase
Run ls 
ADD . /codebase/
WORKDIR /codebase
RUN pip install -r requirement.txt
EXPOSE 80/tcp