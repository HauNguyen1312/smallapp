# Generated by Django 2.0.5 on 2018-05-24 17:31

from django.conf import settings
from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    initial = True

    dependencies = [
        migrations.swappable_dependency(settings.AUTH_USER_MODEL),
    ]

    operations = [
        migrations.CreateModel(
            name='Answer',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('answer_text', models.CharField(max_length=500)),
                ('answer_date', models.DateTimeField(verbose_name='date published')),
            ],
        ),
        migrations.CreateModel(
            name='Question',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('question_text', models.CharField(max_length=500)),
                ('anonymous', models.CharField(blank=True, max_length=10, null=True)),
                ('pub_date', models.DateTimeField(verbose_name='date published')),
                ('questioner_id', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='questioner', to=settings.AUTH_USER_MODEL)),
                ('responser_id', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='responser', to=settings.AUTH_USER_MODEL)),
            ],
        ),
        migrations.AddField(
            model_name='answer',
            name='question_id',
            field=models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='vejoi.Question'),
        ),
    ]
