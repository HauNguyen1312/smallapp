from django.db import models
from model_utils.models import SoftDeletableModel, TimeStampedModel


class BaseModel(SoftDeletableModel, TimeStampedModel):
    class Meta:
        abstract = True