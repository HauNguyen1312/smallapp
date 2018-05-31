from django.urls import path
from django.contrib.auth import views as ath_view
from . import views


urlpatterns= [
	path('', views.index, name='askme'),
	path('ask/', views.AskView.as_view(), name ='ask'),
	path('signup/', views.signup, name='signup'),
	path('<str:slug>/', views.ProfileView.as_view(), name='profile'),
	path('login/', ath_view.login, {'template_name':'vejoi/login.html'}, 
		name='login'),
	path('login/', ath_view.logout, 
		name='logout'),
]