import * as React from 'react';
import List from '@mui/material/List';
import ListItem from '@mui/material/ListItem';
import ListItemButton from '@mui/material/ListItemButton';
import ListItemIcon from '@mui/material/ListItemIcon';
import ListItemText from '@mui/material/ListItemText';
import Stack from '@mui/material/Stack';
import HomeRoundedIcon from '@mui/icons-material/HomeRounded';
import AnalyticsRoundedIcon from '@mui/icons-material/AnalyticsRounded';
import PeopleRoundedIcon from '@mui/icons-material/PeopleRounded';
import AssignmentRoundedIcon from '@mui/icons-material/AssignmentRounded';
import SettingsRoundedIcon from '@mui/icons-material/SettingsRounded';
import InfoRoundedIcon from '@mui/icons-material/InfoRounded';
import HelpRoundedIcon from '@mui/icons-material/HelpRounded';
import { BookIcon, DotIcon, ExternalLink, FileQuestionIcon, HomeIcon, Link2Icon, MailQuestion } from 'lucide-react';
import { link } from 'fs';
import { AnimatePresence,motion } from 'motion/react';
import { cn } from '@/lib/utlis';
import { Link, usePage } from '@inertiajs/react';

const mainListItems = [
  {
    text: 'Home',
    link: '/dashboard',
    icon: <HomeIcon size={19} />
  },
  {
    text: 'Books',
    sub: [
      {
        title: 'Bible Books',
        link: '/Books/Bible'
      },
      {
        title: 'Other Books',
        link: '/Books/Other'
      }
    ],
    icon: <BookIcon size={19} />
  },
  {
    text: 'Question Bank',
    sub: [
      {
        title: 'Bible Books',
        link: '/QuestionBank'
      },
      {
        title: 'Other Books',
        link: '/QuestionBank'
      }
    ],
    icon: <FileQuestionIcon size={19} />
  },
  
 
];

const secondaryListItems = [
  { text: 'Settings', icon: <SettingsRoundedIcon /> },
];

export default function MenuContent() {
  const pageurl = usePage();
  console.log(pageurl)
  const [selectedIndex, setselectedIndex] = React.useState(0)
  return (
    <Stack sx={{ flexGrow: 1, p: 1, justifyContent: 'space-between' }}>
      <div className='flex flex-col gap-1'>
        {mainListItems.map((item, index) => (
          <div  key={index} className='cursor-pointer relative'>
            <div className={cn('absolute top-0 left-[-43px] w-10 h-full bg-primary-500 rounded-md',selectedIndex==index?'':'hidden')}></div>
            {item.link ? <Link href={item.link ?? 'void(0)'} onClick={()=>selectedIndex == index?setselectedIndex(-1):setselectedIndex(index)} className={cn('flex p-2 gap-2 items-center',pageurl.url==item.link?'bg-zinc-200 text-primary-600 rounded-md':'')}>
              <div >{item.icon}</div>
              <p>{item.text}</p>
            </Link> : <div onClick={()=>selectedIndex == index?setselectedIndex(-1):setselectedIndex(index)} className={cn('flex p-2 gap-2 items-center',pageurl.url==item.link?'bg-zinc-200 text-primary-600 rounded-md':'')}>
              <div >{item.icon}</div>
              <p>{item.text}</p>  
            </div>}
            <AnimatePresence>
              {selectedIndex == index && <motion.div initial={{height:0,opacity:0}} animate={{height:'auto',opacity:1}} exit={{height:0,opacity:0}} className='bg-zinc-200 overflow-hidden flex flex-col gap-0  '>
                {item.sub?.map((subitem, sindex) => {
                  return <div key={sindex} className='flex ps-5 p-1 gap-2 items-center'>
                    <ExternalLink size={16} />
                    <ListItemText primary={subitem.title} />
                  </div>;
                })}
              </motion.div>}
            </AnimatePresence>
          </div>
        ))}
      </div>
      <List dense>
        {secondaryListItems.map((item, index) => (
          <ListItem key={index} disablePadding sx={{ display: 'block' }}>
            <ListItemButton>
              <ListItemIcon>{item.icon}</ListItemIcon>
              <ListItemText primary={item.text} />
            </ListItemButton>
          </ListItem>
        ))}
      </List>
    </Stack>
  );
}
