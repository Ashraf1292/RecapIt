import json
import requests

# Replace 'YOUR_API_KEY' with your actual API key
headers = {"Authorization": "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoiYmQwMzI5ZGItZTg2Ni00ZGI0LWE3MDYtM2IyNTMwMDIwZDFhIiwidHlwZSI6ImFwaV90b2tlbiJ9.dDk55-7VgBGEYCBf4j8JhmiRHb0reEk9MA20cUioc4Y"}

url = "https://api.edenai.run/v2/text/summarize"

# Replace 'your text' with the actual text you want to summarize
payload = {"providers": "microsoft,connexun", "language": "en", "text": "A private cloud refers to cloud computing resources used exclusively by a single business or organization. A private cloud can be physically located on the company’s onsite datacenter. Some companies also pay third-party service providers to host their private cloud. A private cloud is one in which the services and infrastructure are maintained on a private network.","max_characters": 500 }

response = requests.post(url, json=payload, headers=headers)

result = json.loads(response.text)
print(result)

if response.status_code == 200:
    result = json.loads(response.text)
    summarized_text = result['microsoft']['result']  # Change provider as needed

    # Save the summarized text to a .txt file
    with open('summarized_text.txt', 'w', encoding='utf-8') as file:
        file.write(summarized_text)

    print("Summarized text saved to 'summarized_text.txt'")
else:
    print(f"Error: {response.status_code} - {response.text}")
