pipeline {
  agent any
  options {
    buildDiscarder(logRotator(numToKeepStr: '5'))
  }
  environment {
    DOCKERHUB_CREDENTIALS = credentials('docker-hub-credentials')
  }
  stages {
    stage('Build') {
      steps {
        sh 'docker build -t sambhaji24/nodejsapp_kiran .'
      }
    }
    stage('Login') {
      steps {
        sh 'echo $DOCKERHUB_CREDENTIALS_PSW | docker login -u $DOCKERHUB_CREDENTIALS_USR --password-stdin'
      }
    }
    stage('Push') {
      steps {
        sh 'docker push sambhaji24/nodejsapp_kiran'
      }
    }
  }
  post {
    always {
      sh 'docker logout'
    }
  }
}
