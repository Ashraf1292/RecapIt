import json
import requests

# Replace 'YOUR_API_KEY' with your actual API key
headers = {"Authorization": "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoiYmQwMzI5ZGItZTg2Ni00ZGI0LWE3MDYtM2IyNTMwMDIwZDFhIiwidHlwZSI6ImFwaV90b2tlbiJ9.dDk55-7VgBGEYCBf4j8JhmiRHb0reEk9MA20cUioc4Y"}

url = "https://api.edenai.run/v2/text/summarize"

# Replace 'your text' with the actual text you want to summarize
payload = {"providers": "microsoft,connexun", "language": "en", "text": "Bond discovers that the radio beam being prepared to disrupt the launch is powered by a nuclear pool reactor, and overloads it as the launch commences. Dr. No attempts to stop him, but falls into the reactor pool and is boiled to death. As the base's personnel evacuate, Bond frees Ryder before the two escape the island by boat, moments before the base is destroyed. Felix finds the pair adrift at sea after their boat runs out of fuel, and has them towed to safety by a Royal Navy ship. However, as Ryder passionately kisses him, Bond lets go of the tow rope to embrace her."}
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
