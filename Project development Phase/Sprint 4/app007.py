from flask import Flask, request, render_template
import requests


# NOTE: you must manually set API_KEY below using information retrieved from your IBM Cloud account.
API_KEY = "xnDDhAdOjxcO_dQeVyKQnMumIGziTBtDIQjhQvUUSHVh"
token_response = requests.post('https://iam.cloud.ibm.com/identity/token', data={"apikey":
API_KEY, "grant_type": 'urn:ibm:params:oauth:grant-type:apikey'})
mltoken = token_response.json()["access_token"]

header = {'Content-Type': 'application/json', 'Authorization': 'Bearer ' + mltoken}

app = Flask(__name__)



@app.route("/")
def Home():
    return render_template('home.html')

@app.route('/Mydashboard.html',methods = ['POST','GET'])
def predict():
    if request.method == "POST":
        gender = request.form['gender']
        married = request.form['married']
        dependents = request.form['dep']
        education = request.form['edu']
        employment = request.form['se']
        applicant_income = request.form['ai']
        coapplicant_income = request.form['cai']
        loan_amount = request.form['la']
        loan_amount_term = request.form['lat']
        credit_history = request.form['ch']
        prop_area = request.form['pa']

        if gender == 'Male':
            gender = 1
        else:
            gender = 0

        if married == 'Yes':
            married = 1
        else:
            married = 0

        if dependents == '0':
            dependents = 0
        elif dependents == '1':
            dependents = 1
        elif dependents == '2':
            dependents = 2
        else:
            dependents = 3

        if education == 'Graduate':
            education = 0
        else:
            education = 1

        if employment == 'Yes':
            employment = 1
        else:
            employment = 0
        if credit_history=='Yes':
            credit_history=1
        else:
            credit_history=0
        if prop_area == 'Rural':
            prop_area = 0
        elif prop_area == 'Semiurban':
            prop_area = 1
        else:
            prop_area = 2

        
        x=[[gender,married,dependents, education, employment,applicant_income,coapplicant_income,loan_amount, loan_amount_term,credit_history,prop_area]]
        # NOTE: manually define and pass the array(s) of values to be scored in the next line
        payload_scoring = {"input_data": [{"fields": [['Gender','Married','Dependents','Education','Self_Employed','ApplicantIncome','CoapplicantIncome','LoanAmount','Loan_Amount_Term','Credit_History','Property_Area']], "values": x}]}
        response_scoring = requests.post('https://eu-de.ml.cloud.ibm.com/ml/v4/deployments/767f401b-2a43-435e-8c2f-3920659bd30d/predictions?version=2022-11-19', json=payload_scoring,
        headers={'Authorization': 'Bearer ' + mltoken})
        print("Scoring response")
        prediction=response_scoring.json()
        print(response_scoring.json())
        if(prediction=="N"):
            prediction="No"
        else:
            prediction="Yes"
        return render_template('submit.html', prediction_text='{}'.format(prediction))


        
    else:
          return render_template("Mydashboard.html")
    

    


if __name__ == "__main__":
    app.run(debug=True)


