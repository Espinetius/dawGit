class DevelopmentConfig():
    DEBUG = True
    MYSQL_HOST = 'localhost'
    MYSQL_USER = 'david'
    MYSQL_PASSWORD = '1234'
    MYSQL_DB = 'escuela'


config = {
    'development': DevelopmentConfig
}
