from project.models import BaseModel
from django.contrib.auth.models import User
from django.db import models


class Question(BaseModel):
	name = models.CharField('Name of asker', max_length=255, default = '')
	text = models.TextField('Question')
	answer = models.TextField(blank=True, null=True)
	responder = models.ForeignKey(
		User,
		on_delete=models.CASCADE, 
		related_name='questions')

	def __str__(self):
		return self.text
