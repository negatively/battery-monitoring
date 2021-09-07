from flask import Flask, render_template, url_for

app = Flask(__name__)

batteries =  [
    {
        'stat' : 77
    }
]

@app.route("/")
def hello_world():
    return render_template("home.html", batteries = batteries)

if __name__ == '__main__':
    app.run(debug=True)
