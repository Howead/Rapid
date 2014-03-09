from flask import Flask
from flask import request
from flask import render_template
from flask_sqlalchemy import SQLAlchemy
from jinja2 import Template

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:////tmp/hack.db'
db = SQLAlchemy(app)



class User(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    username = db.Column(db.String(80), unique=True)
    color = db.Column(db.String(120), unique=False)
    breed = db.Column(db.String(120), unique=False)

    def __init__(self, username, color,breed):
        self.username = username
        self.color = color
        self.breed = breed

    def __repr__(self):
        return 'User:{user}, color:{color}'.format(user=self.username,color=self.color)
template = Template('Hello {{ users }}!')

@app.route('/view/<name>', methods=['POST','GET'])
def view(name=None):
    
    if name =='Warrior': 
        return render_template("petdatingprofile.html")
        
    elif name == 'Scarlet':
        return render_template("petdatingprofiles.html")
    
    
@app.route('/img/<name>', methods=['POST','GET'])
def img(name):
        return app.send_static_file(name)

@app.route('/search', methods=['POST','GET'])
def find(users=None):
    
    searchword=request.args.get('n')
    # print(searchword)
   # word2=word2.rstrip()
    if (searchword==None):
        return render_template("search.html")
    searchword = str(request.args.get('n').rstrip())
    word2 =str(request.args.get('color').rstrip())
    word3 =str(request.args.get('breed'))
    if (searchword=='all'):
        if(word2=='all'):
            if(word3=='all'):
                return render_template("usert.html", users=User.query.all())
            else:
               return render_template("usert.html", users=User.query.filter(User.breed==word3).all())
        else:
            if(word3=='all'):
                return render_template("usert.html", users=User.query.filter(User.color==word2).all())
            else:
                return render_template("usert.html", users=User.query.filter(User.breed==word3).filter(User.color==word2).all())
    else:
        if(word2=='all'):
            if(word3=='all'):
                return render_template("usert.html", users=User.query.limit(searchword).all())
            else:
               return render_template("usert.html", users=User.query.filter(User.breed==word3).limit(searchword).all())
        else:
            if(word3=='all'):
                return render_template("usert.html", users=User.query.filter(User.color==word2).limit(searchword).all())
            else:
                return render_template("usert.html", users=User.query.filter(User.breed==word3).filter(User.color==word2).limit(searchword).all())
        return render_template("usert.html", users=User.query.limit(searchword).all())

@app.route('/users/')
def hello2(users=None):
    return render_template('usert.html', users=User.query.all())

if __name__ == "__main__":
    app.run(debug=True)