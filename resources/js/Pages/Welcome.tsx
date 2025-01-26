import { PageProps } from '@/types';
import { Head, Link } from '@inertiajs/react';
import ApplicationLogo from "@/Components/ApplicationLogo";
import HomeAppNavbar from '@/Components/user/HomeAppNavbar';
import { ArrowRight } from 'lucide-react';
import { motion } from 'motion/react'

export default function Welcome({
    auth,
}: PageProps<{}>) {

    return (
        <>
            <Head title="Home" />
            <main className='pt-[100px]'>
                {/* <UserNavbar user={auth.user} /> */}
                <div className='screen' >
                    <HomeAppNavbar />
                    <div className="screen px-5">
                        <h1 className="text-3xl font-bold text-gray-800 mb-6">Welcome Back!</h1>
                    </div>
                    <div className="min-h-screen">
                        <main className="px-6 py-8">
                            <div className="screen grid md:grid-cols-2 grid-cols-1 pb-5">
                                <Card2
                                    title="Daily Bread"
                                    subtitle="Season 2"
                                    subsub="Day 1"
                                    description=""
                                    bgColor="from-green-300"
                                />
                            </div>
                            <div className="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                                <Card
                                    title="Bibliya Quiz"
                                    subtitle="Ulpathi"
                                    description={"Next Quiz \n Ch: 01"}
                                    bgColor="from-green-300"
                                    icon="/storage/bible_quiz.png"
                                />
                                <Card
                                    title="E Book Quiz"
                                    subtitle="93 Books Available"
                                    description=""
                                    bgColor="from-blue-300"
                                    icon="/storage/ebook.jpg"
                                />
                                <Card
                                    title="Video Book"
                                    subtitle="10K+ Videos Available"
                                    description=""
                                    bgColor="from-yellow-300"
                                    icon="/storage/videobook.png"
                                />
                                <Card
                                    title="DABAR"
                                    subtitle="Alternative to Quiz Platform"
                                    description="2 Quiz Live Available"
                                    bgColor="from-red-300"
                                    icon="/storage/variety_quiz.png"
                                />
                            </div>

                            <div className="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                                <Card2
                                    title="Video Bokka"
                                    subtitle="10K+ Videos Available"
                                    description=""
                                    bgColor="from-pink-300"
                                    icon="/storage/vachanavayal_bokka.png"
                                />
                                <Card2
                                    title="Logos Quiz"
                                    subtitle="75M+ Questions Available"
                                    description=""
                                    bgColor="from-yellow-300"
                                    icon="/storage/logos_club.webp"
                                />
                                <Card2
                                    title="Publications"
                                    subtitle="100+ Books Available"
                                    description=""
                                    bgColor="from-green-300"
                                    icon="/storage/publications.png"
                                />
                            </div>

                            <img className='w-full' src={'/storage/poster_light.jpg'} />
                        </main>
                    </div>
                </div>
            </main>
        </>
    );
}

const Card = ({ title, subtitle, description, bgColor, icon }: { title: string, subtitle: string, description: string, bgColor: string, icon: string }) => {
    return (
        <motion.div whileTap={{ scale: 0.98 }} className={`p-4 rounded-lg min-w-[200px] shadow-none border-[0.08rem] cursor-pointer transition-all  border-zinc-50 hover:border-zinc-300 bg-gradient-to-tl ${bgColor} to-white`}>
            <div className="flex flex-col items-start gap-4">
                <img src={icon} alt="icon" className="w-[80px] h-[80px] rounded-md" />
                <div>
                    <h3 className="text-[1.5rem] font-semibold">{title}</h3>
                    <p className="text-[1rem] text-gray-600">{subtitle}</p>
                    {description && <span className="text-xs text-gray-500">{description}</span>}
                </div>
            </div>
            <div className="flex justify-end w-full">
                <button className="px-3 py-2 bg-white rounded-md"><ArrowRight size={20} /></button>
            </div>
        </motion.div>
    );
};
const Card2 = ({ title, subtitle,subsub, description, bgColor, icon }: { title: string, subsub?:string,subtitle: string, description: string, bgColor: string, icon?: string }) => {
    return (
        <motion.div whileTap={{ scale: 0.98 }} className={`p-4 rounded-lg shadow-non border-[0.02rem] hover:shadow-xl cursor-pointer transition-all border-zinc-300 `}>
            <div className="flex items-start gap-4">
                {icon &&
                    <img src={icon} alt="icon" className="w-[80px] h-[80px]" />
                }
                <div>
                    <h3 className="text-[1.5rem] font-semibold">{title}</h3>
                    <p className="text-sm text-gray-600">{subtitle}</p>
                    {description && <span className="text-xs text-gray-500">{description}</span>}
                </div>
            </div>
            <div className="flex justify-end w-full">
                <button className="px-3 py-2 bg-white rounded-md"><ArrowRight size={20} /></button>
            </div>
        </motion.div>
    );
};