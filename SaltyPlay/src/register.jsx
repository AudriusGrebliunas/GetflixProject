import React from "react";
import { useNavigate } from "react-router-dom";
import { postRegister } from "./Compenant/api";

export default function Register() {
    const navigate = useNavigate();
    let data;
    const handleSubmit = async (event) => {
        const first_name = document.getElementById("grid-first-name").value;
        const last_name = document.getElementById("grid-last-name").value;
        const password = document.getElementById("grid-password").value;
        const email = document.getElementById("grid-mail").value;
        const address = document.getElementById("grid-city").value;
        const dob = document.getElementById("grid-dob").value;
        const question = document.getElementById("grid-state").value;
        const questionAnswer = document.getElementById("grid-answer").value;
        event.preventDefault();
        try {
            data = await postRegister(first_name, last_name, email, password, address, dob, question, questionAnswer);
            if (data.status === '200') {
                navigate('/');
            }
            else {
                document.getElementById("errorMessage").innerText = data.message;
            }

            console.log(data.status);
        }
        catch (error) {
            console.error(error);
        }

    };
    return (
        <div className="h-screen w-screen bg-gray-800">
            <div className="h-[20%] w-full flex justify-center items-center">
                <p className="text-7xl font-bold tex-black text-white mb-8">SALTY</p>
            </div>
            <div id="errorMessage" className="flex justify-center items-center">
            </div>
            <div className="h-[80%] w-full flex justify-center items-center">
          
                <form class="w-full max-w-lg" onSubmit={handleSubmit}>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label
                                class="block uppercase tracking-wide tex-black text-white text-xs font-bold mb-2"
                                for="grid-first-name"
                            >
                                First Name
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 tex-black border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-first-name"
                                type="text"
                                placeholder="Jane"
                            />
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label
                                class="block uppercase tracking-wide tex-black text-xs font-bold text-white mb-2"
                                for="grid-last-name"
                            >
                                Last Name
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 tex-black border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name"
                                type="text"
                                placeholder="Doe"
                            />
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-1 mb-6">
                        <label
                            class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                            for="grid-mail"
                        >
                            E-mail
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-mail"
                            type="email"
                            placeholder="incognito@gmail.com"
                        />
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label
                                class="block uppercase tracking-wide tex-black text-xs font-bold text-white mb-2"
                                for="grid-password"
                            >
                                Password
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 tex-black border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-password"
                                type="password"
                                placeholder="******************"
                            />
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label
                                class="block uppercase tracking-wide tex-black text-xs font-bold text-white mb-2"
                                for="grid-city"
                            >
                                Adress
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-city"
                                type="text"
                                placeholder="Av. Stallingrad"
                            />
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label
                                class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                                for="grid-dob"
                            >
                                Date of Birth
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 tex-black border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-dob"
                                type="date"
                                placeholder="DD/MM/YYYY"
                            />
                        </div>
                    </div>
                    <div className="w-full h-12 mt-5">
                        <div class="w-full px-3 mb-6">
                            <label
                                class="block uppercase tracking-wide tex-black text-xs text-white font-bold mb-2"
                                for="grid-state"
                            >
                                Secret Question
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-500 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-state"
                                >
                                    <option value="1">Quelle est la ville où vous êtes né(e)?</option>
                                    <option value="2">Quel est votre film préféré?</option>
                                    <option value="3">Quel est le nom de votre premier animal de compagnie?</option>
                                    <option value="4">Quelle est votre couleur préférée?</option>
                                    <option value="5">Quel est votre plat préféré?</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white">
                                    <svg
                                        class="fill-current h-4 w-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                    >
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap mt-[40px] mx-1">
                        <div class="w-full px-3">
                            <label
                                class="block uppercase tracking-wide tex-black text-xs font-bold text-white mb-2"
                                for="grid-answer"
                            >
                                Answer
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 tex-black border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-answer"
                                placeholder=""
                            />
                        </div>
                    </div>

                    <div className="w-full flex items-center justify-center mt-4">
                        <button
                            type="submit"
                            className="bg-gray-600 text-white rounded py-3 px-4 w-[30%] mt-3"
                        >
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    );
}