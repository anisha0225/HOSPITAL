const chatbotMessages = document.getElementById('chatbot-messages');
const userInput = document.getElementById('user-input');
const sendButton = document.getElementById('send-button');

sendButton.addEventListener('click', sendMessage);

function sendMessage() {
    const message = userInput.value;
    if (message.trim() === '') {
        return;
    }
    
    const userMessage = createMessage('user', message);
    chatbotMessages.appendChild(userMessage);
    userInput.value = '';

    const chatbotResponse = getChatbotResponse(message);
    setTimeout(() => {
        const responseMessage = createMessage('chatbot', chatbotResponse);
        chatbotMessages.appendChild(responseMessage);
        chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
    }, 500);
}

function createMessage(sender, text) {
    const messageElement = document.createElement('div');
    messageElement.classList.add('chatbot-message');
    messageElement.classList.add(sender);
    messageElement.innerText = text;
    return messageElement;
}

function getChatbotResponse(userMessage) {
    // Replace this with your actual chatbot logic
    const responses = {
        'hello': 'Hello! How can I assist you?',
        'hi':'Hello! How can I assist you?',
        'how are you': 'I am just a chatbot, but I am here to help!',
        'bye': 'Goodbye! Have a great day!',
        'i have cough':'drink hot water, and also drink tea with ginger it may help you',
        'what to do if cuts':'Wash the cut properly to prevent infection and stop the bleeding by applying pressure for 1-2minutes until bleeding stops. Apply Petroleum Jelly to make sure that the wound is moist for quick healing. Finally cover the cut with a sterile bandage. Pain relievers such as acetaminophen can be applied.',
        'how to cure cuts':'Wash the cut properly to prevent infection and stop the bleeding by applying pressure for 1-2minutes until bleeding stops. Apply Petroleum Jelly to make sure that the wound is moist for quick healing. Finally cover the cut with a sterile bandage. Pain relievers such as acetaminophen can be applied.',
        'which medicine to apply for cuts':'Wash the cut properly to prevent infection and stop the bleeding by applying pressure for 1-2minutes until bleeding stops. Apply Petroleum Jelly to make sure that the wound is moist for quick healing. Finally cover the cut with a sterile bandage. Pain relievers such as acetaminophen can be applied.',
        'what to apply on cuts':'Wash the cut properly to prevent infection and stop the bleeding by applying pressure for 1-2minutes until bleeding stops. Apply Petroleum Jelly to make sure that the wound is moist for quick healing. Finally cover the cut with a sterile bandage. Pain relievers such as acetaminophen can be applied.',
        'cuts':'             .....Wash the cut properly to prevent infection and stop the bleeding by applying pressure for 1-2minutes until bleeding stops. Apply Petroleum Jelly to make sure that the wound is moist for quick healing. Finally cover the cut with a sterile bandage. Pain relievers such as acetaminophen can be applied.',
        'how do you treat a sprain':'Use an ice pack or ice slush bath immediately for 15 to 20 minutes and repeat every two to three hours while youre awake. To help stop swelling, compress the ankle with an elastic bandage until the swelling stops. In most cases, pain relievers — such as ibuprofen (Advil, Motrin IB, others) or naproxen sodium (Aleve, others) or acetaminophen (Tylenol, others) are enough to manage the pain of a sprained ankle.',
        'what to do if i get a sprain':'Use an ice pack or ice slush bath immediately for 15 to 20 minutes and repeat every two to three hours while youre awake. To help stop swelling, compress the ankle with an elastic bandage until the swelling stops. In most cases, pain relievers — such as ibuprofen (Advil, Motrin IB, others) or naproxen sodium (Aleve, others) or acetaminophen (Tylenol, others) are enough to manage the pain of a sprained ankle.',
        'which cream to apply if i get a sprain':'Use an ice pack or ice slush bath immediately for 15 to 20 minutes and repeat every two to three hours while youre awake. To help stop swelling, compress the ankle with an elastic bandage until the swelling stops. In most cases, pain relievers — such as ibuprofen (Advil, Motrin IB, others) or naproxen sodium (Aleve, others) or acetaminophen (Tylenol, others) are enough to manage the pain of a sprained ankle.',
        'sprain':'Use an ice pack or ice slush bath immediately for 15 to 20 minutes and repeat every two to three hours while youre awake. To help stop swelling, compress the ankle with an elastic bandage until the swelling stops. In most cases, pain relievers — such as ibuprofen (Advil, Motrin IB, others) or naproxen sodium (Aleve, others) or acetaminophen (Tylenol, others) are enough to manage the pain of a sprained ankle.',
        'which medicine to apply if I get a sprain':'Use an ice pack or ice slush bath immediately for 15 to 20 minutes and repeat every two to three hours while youre awake. To help stop swelling, compress the ankle with an elastic bandage until the swelling stops. In most cases, pain relievers — such as ibuprofen (Advil, Motrin IB, others) or naproxen sodium (Aleve, others) or acetaminophen (Tylenol, others) are enough to manage the pain of a sprained ankle.',
        'cough':' Use honey to treat a cough, mix 2 teaspoons (tsp) with warm water or an herbal tea. Drink this mixture once or twice a day. Do not give honey to children under 1 year of age. 2) Ginger:- Brew up a soothing ginger tea by adding 20–40 grams (g) of fresh ginger slices to a cup of hot water. Allow to steep for a few minutes before drinking. Add honey or lemon juice to improve the taste and further soothe a cough. 3) Fluids:- Staying hydrated is vital for those with a cough or cold. Research indicates that drinking liquids at room temperature can alleviate a cough, runny nose, and sneezing.'
    };
    
    const response = responses[userMessage.toLowerCase()] || "I am not sure how to respond to that.";
    return response;
}
