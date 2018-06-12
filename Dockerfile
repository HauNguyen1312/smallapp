FROM python:3.6.5
ENV PYTHONUNBUFFERED=1
RUN mkdir /codebase
ADD . /codebase/
WORKDIR /codebase
RUN pip install -r requirements.txt
EXPOSE 80/tcp
CMD python3 manage.py runserver 0.0.0.0:80