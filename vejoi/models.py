from django.db import models

class Question(models.Model):
	question_text = models.CharField(max_length=500)
	anonymous = models.CharField(max_length=10, blank=True, null=True)
class Answer(models.Model):
	answer_text = models.CharField(max_length=500)