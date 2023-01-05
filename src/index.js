const students = [
    { name: 'Павел', age: 20 },
    { name: 'Иван', age: 20 },
    { name: 'Эдем', age: 20 },
    { name: 'Денис', age: 20 },
    { name: 'Виктория', age: 20 },
    { age: 40 },
]

//Задание 1
function pickPropArray(students, property)
{
    let arr = []

    for (let stud of students) {
        if (stud.hasOwnProperty(property))
        {
            arr.push(stud[property])
        }
    }
    return arr
}

const result = pickPropArray(students, 'name')
console.log(result)

//Задание 2
function createCounter()
{
    let count = 0

    return function ()
    {
        count+= 5
        console.log(count)
    }
}
const counter1 = createCounter()
counter1()
counter1()

const counter2 = createCounter()
counter2()
counter2()

//Задание 3
function spinWords(text)
{
    let str = text.split(' ')
    let newStr = ''

    for (let word of str)
    {
        if (word.length < 5)
        {
            newStr += word + ' '
        }
        else
        {
            newStr += word.split('').reverse().join("") + ' '
        }
    }
    return newStr
}

const result1 = spinWords( "Привет от Legacy" )
console.log(result1)

const result2 = spinWords( "This is a test" )
console.log(result2)

//Задание 4
function findSum(nums, target)
{
    for (let i = 0; i < nums.length; i++)
    {
        for (let j = 0; j < nums.length; j++)
        {
            if (i !== j)
            {
                if(nums[i] + nums[j] === target)
                {
                    return [i, j]
                }
            }
        }
    }
}
const result3 = findSum([2,7,11,15], 9)
console.log(result3)

//Задание 5
function biggestPref(text)
{
    let pref = text[0].slice(-1);
    let prefLength = 1;
    while(true)
    {
        for (let i = 0; i < text.length; i++)
        {
            if(!text[i].endsWith(pref))
            {
                if (pref.slice(1).length <= 1)
                {
                    return '';
                }
                else
                {
                    return pref.slice(1);
                }
            }
        }
        prefLength++;
        pref = text[0].slice(-prefLength);
    }
}
const result4 = biggestPref(["цветок","поток","хлопок"])
console.log(result4);

const result5 = biggestPref(["собака","гоночная машина","машина"])
console.log(result5);
