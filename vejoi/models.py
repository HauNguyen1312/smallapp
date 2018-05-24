from django.db import models

class User(models.Models):
	name = models.CharField(max_length=100)
	email = models.EmailField(max_length=200)
	password = models.passwordField(max_length=100)
	Dateofbirth = models.DateTimeField('date published')
class Question(models.Models):
	question_text = models.CharField(max_length=500)
	anonymous = models.CharField(max_length=10, blank=True, null=True)
class Answer(models.Models):
	answer_text = models.CharField(max_length=500)
# class Question(models.Models):
# 	question_text = models.CharField(max_length=500)
# 	pub_date = models.DateTimeField('date published')
# class Answer(models.Models):

# Create your models here.
