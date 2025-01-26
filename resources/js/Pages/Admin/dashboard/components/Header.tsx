import * as React from 'react';
import Stack from '@mui/material/Stack';
import NotificationsRoundedIcon from '@mui/icons-material/NotificationsRounded';
import CustomDatePicker from './CustomDatePicker';
import NavbarBreadcrumbs from './NavbarBreadcrumbs';
import MenuButton from './MenuButton';
import ColorModeIconDropdown from '@/Pages/shared-theme/ColorModeIconDropdown';

import Search from './Search';
import { Head } from '@inertiajs/react';
import { Typography } from '@mui/material';

export default function Header({ title, list }: { title: string, list: string[] }) {
  return (
    <>
      <Stack
        direction="row"
        sx={{
          display: { xs: 'none', md: 'flex' },
          width: '100%',
          alignItems: { xs: 'flex-start', md: 'center' },
          justifyContent: 'space-between',
          maxWidth: { sm: '100%', md: '1700px' },
          pt: 1.5,
        }}
        spacing={2}
      >
        <Head>
          <title>{title}</title>
        </Head>
        <NavbarBreadcrumbs list={list} />
        <Stack direction="row" sx={{ gap: 1 }}>
          <Search />
          {/* <CustomDatePicker />
        <MenuButton showBadge aria-label="Open notifications">
          <NotificationsRoundedIcon />
        </MenuButton>
        <ColorModeIconDropdown /> */}
        </Stack>
      </Stack>
      <Typography component="h2" variant="h6" className='w-full' sx={{ textAlign: 'start', mb: 2 }}>
        {list[list.length - 1]}
      </Typography>
    </>
  );
}
