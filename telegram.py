import telebot
bot = telebot.TeleBot('5679026444:AAFHxMdxqUpbuX9newubtWYx5DuBEZevID8')

@bot.message_handler(commands=['start'])
def start(message):
    bot.send_message(message.chat.id, "Направьте мне Вашу афишу мероприятия.")

@bot.message_handler(content_types=['photo'])
def photo_id(message):
    photo = max(message.photo, key=lambda x: x.height)
    print(photo.file_id)

@bot.message_handler(commands=['start'])
def start(message):
    msg = bot.send_message(message.chat.id, 'Отправьте мне сообщение')
    bot.register_next_step_handler(msg, start_2)


def start_2(message):
    print('Ваше ФИО', message.chat.id)
    print('Номер телефона для связи', message.from_user.first_name)
    print('Наименование Вашей организации', message.from_user.last_name)
    print('Стоимость входа для мероприятия (если на платной основе)', message.from_user.username)
    print('Возрастная категория', message.text)
    print('Вид категории (культурное, развлекательное, образовательное, общегородское)', message.text2)
    print('Место проведения мероприятия', message.text2)
    print('Время проведения мероприятия', message.text3)
    print('Дата мероприятия', message.text4)

def fio(message):
        nomer = bot.send_message(message.chat.id, 'Ваше ФИО')
        bot.register_next_step_handler(nomer)
        doc = open('file.txt', 'a')
        doc.write("Услуга - {uslugi}\n".format(uslugi=message.text))

        if __name__ == '__main__':
            bot.polling()


def telephone(message):
    nomer = bot.send_message(message.chat.id, 'Ваш номер телефона')
    bot.register_next_step_handler(nomer)
    doc = open('file.txt', 'a')
    doc.write("Услуга - {uslugi}\n".format(uslugi=message.text))

    if __name__ == '__main__':
        bot.polling()

def nameorg(message):
    nomer = bot.send_message(message.chat.id, 'Ваша организация')
    bot.register_next_step_handler(nomer)
    doc = open('file.txt', 'a')
    doc.write("Услуга - {uslugi}\n".format(uslugi=message.text))

    if __name__ == '__main__':
        bot.polling()

def p(message):
    nomer = bot.send_message(message.chat.id, 'Ваша организация')
    bot.register_next_step_handler(nomer)
    doc = open('file.txt', 'a')
    doc.write("Услуга - {uslugi}\n".format(uslugi=message.text))

    if __name__ == '__main__':
        bot.polling()

def price(message):
    nomer = bot.send_message(message.chat.id, 'Стоимость билета')
    bot.register_next_step_handler(nomer)
    doc = open('file.txt', 'a')
    doc.write("Услуга - {uslugi}\n".format(uslugi=message.text))

    if __name__ == '__main__':
        bot.polling()

def categories(message):
    nomer = bot.send_message(message.chat.id, 'Вид мероприятия (культурное, развлекательное, образовательное, общегородского)')
    bot.register_next_step_handler(nomer)
    doc = open('file.txt', 'a')
    doc.write("Услуга - {uslugi}\n".format(uslugi=message.text))

    if __name__ == '__main__':
        bot.polling()

def data(message):
    nomer = bot.send_message(message.chat.id, 'Дата мероприятия')
    bot.register_next_step_handler(nomer)
    doc = open('file.txt', 'a')
    doc.write("Услуга - {uslugi}\n".format(uslugi=message.text))

    if __name__ == '__main__':
        bot.polling()