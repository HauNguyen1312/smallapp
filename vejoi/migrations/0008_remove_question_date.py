# Generated by Django 2.0.6 on 2018-06-12 03:00

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('vejoi', '0007_auto_20180605_0236'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='question',
            name='date',
        ),
    ]
