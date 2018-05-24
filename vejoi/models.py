from django.db import models
from django.contrib.auth.models import User
import datetime

class Question(models.Model):
	questioner_id = models.ForeignKey(User, on_delete=models.CASCADE, related_name='questioner')
	responser_id = models.ForeignKey(User, on_delete=models.CASCADE, related_name='responser')
	question_text = models.CharField(max_length=500)
	anonymous = models.CharField(max_length=10, blank=True, null=True)
	pub_date = models.DateTimeField('date published')

class Answer(models.Model):
	question_id = models.ForeignKey(Question, on_delete=models.CASCADE)
	answer_text = models.CharField(max_length=500)
	answer_date = models.DateTimeField('date published')