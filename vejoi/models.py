from django.db import models
from django.contrib.urls.models import User
import datetime
class User(models.Model):
	name = models.CharField(max_length=100)
	email = models.EmailField(max_length=200)
	password = models.PasswordField(max_length=100)
	Date_of_birth = models.DateTimeField('date of birth')
class Question(models.Model):
	question_text = models.CharField(max_length=500)
	anonymous = models.CharField(max_length=10, blank=True, null=True)
class Answer(models.Model):
	answer_text = models.CharField(max_length=500)
# class Question(models.Models):
# 	question_text = models.CharField(max_length=500)
# 	pub_date = models.DateTimeField('date published')
# class Answer(models.Models):

# Create your models here.
