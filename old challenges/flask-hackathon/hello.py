from flask import Flask
from flask import request
from flask import render_template

app = Flask(__name__)

@app.route('/find', methods=['POST','GET'])
def find():
	
	searchword = request.args.get('n')
	word2 = request.args.get('query')
	#print("["+searchword+"]")
	#searchword.rstrip()
	if (searchword == '3' and word2 == 'TRD'):
		return render_template("results.html")
	elif searchword == '1':
		return render_template("resultsA.html")
	elif searchword == '5':
		return render_template("results5.html")
	
	else: 
		return "all results"
		
	
	
	
	    
@app.route('/view/<idn>/')
def view(idn=None):
    if idn == '1':
		return render_template("hellot.html",idn="Toyota Exhaust")
		
    if idn == '2':
		return render_template("hello2.html")
		
    else:
		return "Page does not exist"

@app.route('/results/')
def hello4(name=None):
    return render_template('results.html', name=name)

@app.route('/sound/')
def hello3(id=None):
    return app.send_static_file('sound.mp3')


@app.route("/")
def hello():
    return "Hello World!"

if __name__ == "__main__":
    app.run(debug=True)
