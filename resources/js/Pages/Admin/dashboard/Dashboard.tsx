import DashboardLayout from '@/Layouts/DashboardLayout';
import * as React from 'react';
import Header from './components/Header';
import { Typography } from '@mui/material';

export default function Dashboard(props: { disableCustomTheme?: boolean }) {
  return (
    <DashboardLayout title='Dashboard'>
      <Header title='title' list={['Dashboard', 'Overview']} />
      <Typography component="h2" variant="h6" className='w-full' sx={{ textAlign:'start', mb: 2 }}>
        Overview
      </Typography>
    </DashboardLayout>
  );
}
